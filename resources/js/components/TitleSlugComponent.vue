<template>
      <div>
        <div class="form-group">
          <label for="titolo">Titolo</label>
          <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Titolo articolo" v-model="titolo" data-parsley-required data-parsley-maxlength="150">
        </div>

        <div class="form-group">
          <label for="slug">Slug</label>
          <input id="slug" class="form-control" type="text" name="slug" v-model="slug">
        </div>
      </div>
</template>

<script>
    export default {
      props: ['articolo'],
       
       data() {
        return {
            titolo: this.articolo.titolo
        };
      },

      computed: {
        // a computed getter
        slug: function () {
          // `this` points to the vm instance
          return this.titolo.split('').reverse().join('')
        }
      },

      mounted() {
            console.log('Slug Component mounted.')
      }
    
    }
</script>
