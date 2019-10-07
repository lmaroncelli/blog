<template>
  
  <div>
  <div class="post-details" v-for="(article, index) in articles" v-bind:key="index">
  <div class="post-meta d-flex justify-content-between">
    <div class="date meta-last">{{article.giorno}} {{article.mese}} | {{article.anno}}</div>
    <div class="category"><a href="#">{{article.categorie}}</a></div>
  </div>
  <a href="post.html">
    <h3 class="h4">{{article.titolo}}</h3></a>
  <p class="text-muted">{{article.excerpt}}</p>
  <footer class="post-footer d-flex align-items-center">
    <div class="date">
      <i class="icon-clock">{{article.modifica}}</i>
    </div>
    <span class="comments">ultimo aggiornamento</span>
  </footer>
   </div>
</div>

</template>

<script>
    export default {

      //a runtime i paramentri presenti nell’opzione data vengono elevati a proprietà dell’oggetto principale e per accedervi non è necessario fare riferimento all’oggetto data. 

      data() {
        return {
            show:false,
            articles: [],
            keywords: 'sql',
        };
      },
      
      
      // While computed properties are more appropriate in most cases, there are times when a custom watcher is necessary. That’s why Vue provides a more generic way to react to data changes through the watch option. This is most useful when you want to perform asynchronous or expensive operations in response to changing data.

      


      // Oltre al modello dati, è possibile associare all’instanza Vue anche delle funzioni che descrivono il comportamento della nostra applicazione. La definizione di queste funzioni avviene all’interno della proprietà methods passata al costruttore Vue.
      // Queste funzioni hanno una duplice utilità, possono essere registrate come callback di eventi DOM (click, keyup, mouseover…) oppure possono essere invocate manualmente all’interno della nostra istanza Vue.
      
      methods: {
       
      },


      // questo è un hook
      // viene invocato subito dopo che l’istanza viene renderizzata e il frammento DOM originale viene sostituito con quello gestito da Vue
      mounted() {
        axios.get('/search', { params: { keywords: this.keywords } })
                .then(response => this.articles = response.data)
                .catch(error => {
                    console.log(error);
                    alert("Could not load companies");
                  });
        console.log('ListArticlesComponent mounted.');
        }
    }

</script>