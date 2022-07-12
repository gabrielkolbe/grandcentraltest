<script>

$("#warning").hide();

   function validate(filename) {
        var extension = filename.replace(/^.*\./, '');
                
        if (extension == filename) {
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }

        if (extension == 'jpg') {

        } else if (extension == 'jpeg') {

        } else if (extension == 'png') {

        } else if (extension == 'gif') {
              
        } else if (extension == 'ico') {

        } else {
          $("#warning").show();
          $("#btn").hide();
        }
   }  
</script>