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
         if(typeof this.articolo.titolo !== 'undefined') {
          return {
            titolo: this.articolo.titolo
          };
         }
        else {
          return {
            titolo: ''
          };
        }
      },

      computed: {
        // a computed getter
        slug: function () {
          // `this` points to the vm instance
          return this.createSlug(this.titolo);        
        }
      },
      
      methods: {
        createSlug: function(title) {
          var slug = "";
          // Change to lower case
          var titleLower = title.toLowerCase();
          // Letter "e"
          slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
          // Letter "a"
          slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
          // Letter "o"
          slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
          // Letter "u"
          slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
          // Letter "d"
          slug = slug.replace(/đ/gi, 'd');
          // Trim the last whitespace
          slug = slug.replace(/\s*$/g, '');
          // Change whitespace to "-"
          slug = slug.replace(/\s+/g, '-');
          
          return slug;
        }
      },

      mounted() {
            console.log('Slug Component mounted.')
      }
    
    }
</script>
