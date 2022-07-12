<?php 
if(file_exists("app/".ROUTE."/".PAGE."_func.php")){
  include("app/".ROUTE."/".PAGE."_func.php"); 
}
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
  
  <style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>

</head> 
<body> 

  <?php include("app/includes/message.php"); ?>       
  <div class="container">
    <div class="row">
      <?php include("app/".ROUTE."/".PAGE.".php"); ?>
    </div>                                        

  </div>

    <script src="/styles/js/bootstrap5/bootstrap.min.js"></script>
</body>
</html>
