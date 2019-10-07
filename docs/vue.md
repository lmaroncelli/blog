**data-binding**

Una delle funzionalità più interessanti di Vue è il cosiddetto data-binding, ovvero la possibilità di associare un elemento presentazionale con una particolare variabile o oggetto Javascript e di essere certi che eventuali cambiamenti vengano propagati alla view esclusivamente agendo sulla variabile.

- L’interpolazione è la tipologia di data-binding più semplice che è possibile realizzare: 

<div id="vue-app">
  My firstname is {{firstname}} and my lastname is {{lastname}}
</div>


<script>
var vm = new Vue({
  el: '#vue-app',
  data: {
    firstname: 'Alberto',
    lastname: 'Bottarini'
  }
})
</script>


La sintassi “coi baffi” può essere sostituita dalla direttiva v-text con la differenza che quest’ultima modalità ci obbliga a creare un nodo HTML per ospitare il nostro testo:

<div id="vue-app">
  My firstname is <span v-text="firstname"></span"> and my lastname is <span v-text="lastname"></span">
</div>


In automatico Vue, quando deve mostrare un testo, effettua l’escape di eventuali caratteri HTML (in primis i caratteri > e <) per evitare possibili corruzioni della pagina o attacchi XSS.

Quando fosse necessario mostrare tag HTML in modo dinamico, è possibile utilizzare la direttiva v-html esattamente come abbiamo prima utilizzato v-text:

<div id="vue-app">
  My firstname is <span v-html="firstname"></span"> and my lastname is <span v-html="lastname"></span">
</div>

<script>
var vm = new Vue({
  el: '#vue-app',
  data: {
    firstname: '<b>Alberto</b>',
    lastname: '<i>Bottarini<i>'
  }
})
</script>



- Le direttive in Vue.js sono speciali attributi HTML, che iniziano con prefisso v- e che permettono di aggiungere comportamenti a livello di presentazione

Vue also provides the v-model directive that makes two-way binding between form input and app state a breeze:

 <div class="form-group">
    <input type="search" placeholder="What are you looking for?" v-model="keywords">
  </div>

<script>
 data() {
        return {
            title:'Search the blog',
            keywords: null,
            results: []
        };
      },
</script>