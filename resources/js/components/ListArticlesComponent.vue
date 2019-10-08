<template>
  
  <div>
    <div class="post-details" v-for="(article, index) in articles" v-bind:key="index">
      <div class="post-meta d-flex justify-content-between">
        <div class="date meta-last">{{article.giorno_mese}} | {{article.anno}}</div>
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
            keywords: '',
        };
      },
      
      
      // While computed properties are more appropriate in most cases, there are times when a custom watcher is necessary. That’s why Vue provides a more generic way to react to data changes through the watch option. This is most useful when you want to perform asynchronous or expensive operations in response to changing data.

      


      // Oltre al modello dati, è possibile associare all’instanza Vue anche delle funzioni che descrivono il comportamento della nostra applicazione. La definizione di queste funzioni avviene all’interno della proprietà methods passata al costruttore Vue.
      // Queste funzioni hanno una duplice utilità, possono essere registrate come callback di eventi DOM (click, keyup, mouseover…) oppure possono essere invocate manualmente all’interno della nostra istanza Vue.
      
      methods: {
       
      },


      // questo è un hook
      // viene invocato subito dopo che l’istanza viene renderizzata e il frammento DOM originale viene sostituito con quello gestito da Vue

      // The data given by the Api endpoint are wrapped into a data object and the response given by the Axios request is also wrapped into a data object. Consequently, the response of the Axios request is double wrapped into nested data object (response.data.data).
      // https://github.com/laravel/framework/issues/22059

      mounted() {
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
        console.log('ListArticlesComponent mounted.');
        }
    }

</script>