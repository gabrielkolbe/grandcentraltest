 <?php

$alttags = '';
$sliderlabel = ''; 
$slidertagline = '';  

if($postit == "addimage") {

    
    $err = '';
  	if ($_POST['alttags'] == ""){ $_SESSION['message']="Meta keywords is empty - "; }
    
    if($err != '') {
       $_SESSION['error'] = $err;
    } else {

    $alttags = '';
    if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
    
    $imgsizew = $_POST['imgsizew']; //desired w
    $imgsizeh = $_POST['imgsizeh'];  //desired h
    $imgsizep = $_POST['imgsizep'];  // priority
    $thumbwidth = '160';
    if(isset($_POST['imagethumb'])) {
      $thumbwidth = $_POST['imagethumb'];  // priority
    }
  
    include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
      
    $_SESSION['message']="The image has been uploaded";
    header ("location: /dashboard/images/"); 
    exit();
  
  }
  }


?>