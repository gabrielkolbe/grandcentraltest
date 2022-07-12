<script>
function sendajax(theurl) {
    $.ajax({
        url: theurl,
        type: 'post',
        success: function(response){
          $('.modal-body').html(response);
          $('#modalbox').modal('show'); 
        }
    });
  }

</script>