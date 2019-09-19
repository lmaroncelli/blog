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