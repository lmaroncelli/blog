# Laravel 6.0








# parsley javascript

npm install --save parsleyjs


lo installa e lo salva in package.json con 

 "dependencies": {
        "parsleyjs": "^2.9.1"
    }

poi vado nel file resources/js/bootstrap.js e dopo che ha incluso il jquery includo anche questa libreria



try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('parsleyjs');


__npm run dev__

per compilare il js con tutte le librerie dentro




# CKEditor (versione 4 ) 

npm install --save ckeditor

lo trovo in package.json e come cartella in node_modules

lo aggiungo a bootstrap.js come libreria da includere al caricamento

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('parsleyjs');
    require('./it.js');
    require('./it.extra.js');
    require('ckeditor');
    
    
} catch (e) {}


__npm run dev__

per compilare il js con tutte le librerie dentro


se apro il file 

http://blog.xxx/js/app.js


incluso da laravel adesso trovo anche il riferimento a ckeditor


/***/ "./node_modules/ckeditor/ckeditor.js":
/*!*******************************************!*\
  !*** ./node_modules/ckeditor/ckeditor.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {




# TinyMCE


npm install --save tinymce


e poi il solito....



# Material design icon

npm install --save @mdi/font




# install vue

É consigliabile installare subito lo scaffolding per vue, prima di customizzare i file js e scss

__php artisan ui vue__

Vue scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.

questo comando genera il basci scaffolding per vue, in particolare:

- in resources/js/app.js 

aggiunge la chimata a vue 

window.Vue = require('vue');


crea un componente di esempio

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


e il binding con l'elemento del DOM #app (che ci deve essere)

const app = new Vue({
    el: '#app',
});



ATTENZIONE!!! I file bootstrap.js, app.scss e webpack.mix.js vengono riportati allo stato originale, quindi eventuali modifiche effettuate saranno sovrascritte (in questo caso utilizzo git per "scartare" le modifiche)



resources/js/components/ExampleComponent.vue questo è un componente Vue di prova

l'HTML deve essere wrappato con i tag <template></template>

nella sezione <script> </script> c'è la logica delle pagina

ci potrebbe essere anche una sezione <style> </style> con le regole css; se il css deve essere applicato solo al componente si utilizza <style scoped></style>


nel file app.js 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

quindi per usare il componente in file blade basta scrivere <example-component></example-component>

**siccome voglio evitare il messaggio You are running Vue in development mode**

nel file app.js dopo
window.Vue = require('vue');

includo il comando
Vue.config.productionTip = false;



# vue install search

> https://www.algolia.com/doc/guides/building-search-ui/what-is-instantsearch/vue/
> https://community.algolia.com/vue-instantsearch/getting-started/getting-started.html



npm install --save vue-instantsearch

nel package.json ha aggiunto il pacchetto

"vue-instantsearch": "^2.5.0"


in app.js aggiungo: (https://community.algolia.com/vue-instantsearch/getting-started/getting-started.html)


import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);


creo un componente SearchComponent.vue come quello di esempio in cui copio il template della documentazione e lo metto nel widget search



npm run dev per compilare

###############################################################################################################



vagrant plugin install vagrant-vbguest

E certifique-se de atualizar o plugin quando você atualizar o Virtualbox e o pacote de extensão:

vagrant plugin update vagrant-vbguest





installo dal debug bar 
> composer require barryvdh/laravel-debugbar --dev

https://pineco.de/instant-ajax-search-laravel-vue/
