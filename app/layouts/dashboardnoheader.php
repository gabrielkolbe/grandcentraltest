<?php

if(file_exists("app/".ROUTE."/".PAGE."_func.php")){
  include("app/".ROUTE."/".PAGE."_func.php"); 
}

include("app/engine/cache/delete.php");

?>
<!-- dashboard no header -->
<!DOCTYPE html>
<html>
<head>
    <link href="favicon.ico" rel="icon"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
  <link href="/styles/adminkit/static/css/app.css" rel="stylesheet">
  <link href="/styles/css/adminkitoverride.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">        
    
    <title><?php echo PAGE; ?></title>
    
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>  

<?php
if(file_exists("app/".ROUTE."/".PAGE."_header.php")){
  include("app/".ROUTE."/".PAGE."_header.php"); 
}
?>
</head>

<body>
	<div class="wrapper">
  <?php include("app/dashboard/sidebars/adminkit.php");  ?>
		<div class="main">
        <?php include("app/dashboard/headers/adminkit.php"); ?>
        <main class="content">
				<div class="container-fluid p-0">
<div class="mb-3">
<?php if(LOCKSITE == 'yes') { include("app/includes/locked_message.php");  } ?>
<?php include("app/includes/message.php"); ?> 
</div>
<?php include("app/".ROUTE."/".PAGE.".php"); ?>
				</div>
			</main>
		</div>
	</div>

   <!-- <script src="/styles/js/bootstrap5/bootstrap.min.js"></script>  -->
    	<script src="/styles/adminkit/static/js/app.js"></script>

<?php
if(file_exists("app/".ROUTE."/".PAGE."_footer.php")){
  include("app/".ROUTE."/".PAGE."_footer.php"); 
}
?>

</body>

</html>