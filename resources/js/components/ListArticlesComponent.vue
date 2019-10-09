<template>
  
  <div>
    <div class="widget search" style="padding-left:0">
        <!-- Una delle funzionalità più interessanti di Vue è il cosiddetto data-binding, ovvero la possibilità di associare un elemento presentazionale con una particolare variabile o oggetto Javascript e di essere certi che eventuali cambiamenti vengano propagati alla view esclusivamente agendo sulla variabile. -->
      <h3 class="h6" v-text="title"></h3>
      <form action="#" class="search-form">
        <div class="form-group">
          <input type="search" placeholder="What are you looking for?" v-model="keywords">
          <!-- <ul v-if="results.length > 0">
            <li v-for="result in results" :key="result.id" v-text="result.titolo"></li>
          </ul> -->
        </div>
      </form>
    </div>
    <div class="post-details" v-for="(article, index) in articles" v-bind:key="index">
      <div class="post-meta d-flex justify-content-between">
        <div class="date meta-last">{{article.giorno_mese}} | {{article.anno}}</div>
        <div class="category"><a href="#">{{article.categorie}}</a></div>
      </div>
        <a v-bind:href="article.url" target="_blank">
          <h3 class="h4">{{article.titolo}}</h3>
        </a>
      <p class="text-muted">{{article.excerpt}}</p>
      <footer class="post-footer d-flex align-items-center">
        <div class="date">
          <i class="icon-clock"></i> 
          {{article.modifica}}
        </div>
      </footer>
    </div>
</div>

</template>

<script>
    export default {

      //a runtime i paramentri presenti nell’opzione data vengono elevati a proprietà dell’oggetto principale e per accedervi non è necessario fare riferimento all’oggetto data. 

      data() {
        return {
            title:'Search the blog',
            articles: [],
            keywords: '',
        };
      },
      
      
      // While computed properties are more appropriate in most cases, there are times when a custom watcher is necessary. That’s why Vue provides a more generic way to react to data changes through the watch option. This is most useful when you want to perform asynchronous or expensive operations in response to changing data.




       // whenever keywords changes, this function will run
      watch: {
        keywords(after, before) {
            if (after== '') 
              {
                this.articles = [];
              }
            else
              {
                this.search();
              }
        }
      },

      


      // Oltre al modello dati, è possibile associare all’instanza Vue anche delle funzioni che descrivono il comportamento della nostra applicazione. La definizione di queste funzioni avviene all’interno della proprietà methods passata al costruttore Vue.
      // Queste funzioni hanno una duplice utilità, possono essere registrate come callback di eventi DOM (click, keyup, mouseover…) oppure possono essere invocate manualmente all’interno della nostra istanza Vue.
      
      methods: {
      
        search() {
            axios.get('/api/search', { params: { keywords: this.keywords } })
                .then(
                  (response) => {
                    console.log('response.data ='+response.data.data);
                    console.log('response.status ='+response.status);
                    console.log('response.statusText ='+response.statusText);
                    console.log('response.headers ='+response.headers);
                    console.log('response.config ='+response.config);
                    this.articles = response.data.data;
                  })
                .catch(error => {
                    console.log(error);
                    alert("Could not load companies");
                  });
        }, // end search
      
      }, // end methods


      // questo è un hook
      // viene invocato subito dopo che l’istanza viene renderizzata e il frammento DOM originale viene sostituito con quello gestito da Vue

      // The data given by the Api endpoint are wrapped into a data object and the response given by the Axios request is also wrapped into a data object. Consequently, the response of the Axios request is double wrapped into nested data object (response.data.data).
      // https://github.com/laravel/framework/issues/22059

      mounted() {
            console.log('ListArticlesComponent mounted.')        
        }
    }

</script>