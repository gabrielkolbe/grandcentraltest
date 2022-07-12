<?php

if(file_exists("app/".ROUTE."/".PAGE."_func.php")){
  include("app/".ROUTE."/".PAGE."_func.php"); 
}

include("app/engine/cache/delete.php");

?>

<!DOCTYPE html>
<html>
<head>
    <link href="favicon.ico" rel="icon"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
    <title><?php echo PAGE; ?></title>
    
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>  
    <link href="/styles/css/bootstrap5/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/styles/css/bootstrap5/bootstrap5_tweaks.css" rel="stylesheet" type="text/css" />
    
<?php
if(file_exists("app/".ROUTE."/".PAGE."_header.php")){
  include("app/".ROUTE."/".PAGE."_header.php"); 
}
?>
</head> 
<body>
<?php include("app/dashboard/headers/simple.php"); ?>

  <div class="container">

    <div class="row">
    <?php if(LOCKSITE == 'yes') { include("app/includes/locked_message.php");  } ?>
     
    <?php include("app/includes/message.php"); ?> 
    
        <div class="col-sm-2">
            <?php include("app/dashboard/sidebars/collapsible.php");  ?>
        </div>
        <div class="col-sm-10"> 
            <div class="row">
                <?php include("app/".ROUTE."/".PAGE.".php"); ?>
            </div>
        </div>

    </div>                                        

  </div>

    <script src="/styles/js/bootstrap5/bootstrap.min.js"></script>
    

<?php
if(file_exists("app/".ROUTE."/".PAGE."_footer.php")){
  include("app/".ROUTE."/".PAGE."_footer.php"); 
}
?>

</body>
</html>