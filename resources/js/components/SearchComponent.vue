<template>
  <div class="widget search">
  <header>
    <!-- Una delle funzionalità più interessanti di Vue è il cosiddetto data-binding, ovvero la possibilità di associare un elemento presentazionale con una particolare variabile o oggetto Javascript e di essere certi che eventuali cambiamenti vengano propagati alla view esclusivamente agendo sulla variabile. -->
    <h3 class="h6" v-text="title"></h3>
  </header>
  <form action="#" class="search-form">
    <div class="form-group">
      <input type="search" placeholder="What are you looking for?" v-model="keywords">
       <ul v-if="results.length > 0">
        <li v-for="result in results" :key="result.id" v-text="result.titolo"></li>
      </ul>
    </div>
  </form>
</div>
</template>

<script>
    export default {

      //a runtime i paramentri presenti nell’opzione data vengono elevati a proprietà dell’oggetto principale e per accedervi non è necessario fare riferimento all’oggetto data. 

      data() {
        return {
            title:'Search the blog',
            keywords: null,
            results: []
        };
      },
      
      
      // While computed properties are more appropriate in most cases, there are times when a custom watcher is necessary. That’s why Vue provides a more generic way to react to data changes through the watch option. This is most useful when you want to perform asynchronous or expensive operations in response to changing data.

       // whenever keywords changes, this function will run
      watch: {
        keywords(after, before) {
            if (after== '') 
              {
                this.results = [];
              }
            else
              {
                this.fetch();
              }
        }
      },



      // Oltre al modello dati, è possibile associare all’instanza Vue anche delle funzioni che descrivono il comportamento della nostra applicazione. La definizione di queste funzioni avviene all’interno della proprietà methods passata al costruttore Vue.
      // Queste funzioni hanno una duplice utilità, possono essere registrate come callback di eventi DOM (click, keyup, mouseover…) oppure possono essere invocate manualmente all’interno della nostra istanza Vue.
      
      methods: {
        fetch() {
            axios.get('/search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        }
      },


      // questo è un hook
      // viene invocato subito dopo che l’istanza viene renderizzata e il frammento DOM originale viene sostituito con quello gestito da Vue
      mounted() {
            console.log('SearchComponent mounted.')
        }
    }

</script>