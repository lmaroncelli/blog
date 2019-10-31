<script type="text/javascript">

  
  $(document).ready(function() {
    
      $(".delete").click(function(e){
        e.preventDefault();
        var id = $(this).data("id");
        if(window.confirm('Eliminare?')){
          $("form#delete_article_"+id).submit();
        }
      })

      $('.select2').select2({tags: true});

  });

</script>