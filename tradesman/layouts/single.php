<?php 
if(file_exists(APP."/pages/".ROUTE."/".PAGE."_func.php")){
  include(APP."/pages/".ROUTE."/".PAGE."_func.php"); 
}

include (APP."/partials/preheader.php");


include (APP."/partials/header.php");
include ("app/includes/message.php"); ?>
<main>
<div class="container">
<div class="row" style="margin-top:30px">
   <?php include(APP."/pages/".ROUTE."/".PAGE.".php"); ?>
</div>
</div>
</main>
<?php
include (APP."/partials/footer.php"); 

?>
