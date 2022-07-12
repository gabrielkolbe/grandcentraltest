<?php

if($_GET) {
  foreach($_GET as $getkey => $getvalue ) {
     $_POST[$getkey] = mysqlescapestring($getvalue);
  }
}

if (empty($_GET["controller"])) { $urlcontroller = 'home';  }  else { $urlcontroller = $_GET["controller"]; }
if (empty($_GET["action"])) { $urlaction = 'index'; }  else { $urlaction = $_GET["action"]; }


$query = $db->prepare("SELECT * FROM pages WHERE slug = '".$urlcontroller."'");
$query->execute();
$result = $query->fetchAll();
 foreach ($result as $row) {
  define('PGTITLE', $row["name"]);
  define('PGSLUG', $row["slug"]);
  define('PGCONTENTDESC', $row["metadescrip"]);
  define('KEYWORDS', $row["keywords"]);
  define('LAYOUT', $row["layout"]);
  define('CACHEPAGE', $row["cachepage"]);
  define('PAGE', $row["page"]);
  define('ROUTE', $row["route"]);
  define('ROUTESOURCE', 'frontend');

}

if(LOCKSITE == 'yes')  { $_SESSION["site"] = $_SERVER['SERVER_NAME']; $_SESSION["user_id"] = '123';  $_SESSION["role"] = "admin";}



if ( (isset($_SESSION["user_id"])) && ( $_SESSION["site"] == $_SERVER['SERVER_NAME'] )) {

if (defined("PAGE")) {} else {

if ($urlcontroller == 'dashboard') {

if ($_SESSION["role"] == "admin" ) {

$query = $db->prepare("SELECT * FROM dashboard WHERE slug = '".$urlaction."'");
$query->execute();
$result = $query->fetchAll();
 foreach ($result as $row) {
 
    define('TITLE', $row["title"]);
    define('LAYOUT', $row["layout"]);
    define('ROUTE', 'dashboard/'.$row["route"].'/');
    define('PAGE', $row["page"]);
    define('SIDEBAR', $row["sidebar"]);
    define('ROUTESOURCE', 'Dashboard');
  }
  
}  
  
}
}

define('LOGGED', 'in');

} else {
  define('LOGGED', 'out');
}


if (defined("PAGE")) {} else {
//$_SESSION['error'] = 'Page is not available..';
header ("location: /home");
exit();	
}

$postit = '';
if(!empty($_POST['postit'])) {

  if(LOCKSITE == 'yes') {
    
    $req_uri = $_SERVER['REQUEST_URI'];
    $path = substr($req_uri,0,strrpos($req_uri,'/'));
    header ("location: $path");
    exit();
    }
    
  //  var_dump($_POST['csrf_token']);
  //  var_dump($_SESSION['csrf_token']);
  //  die;
  

if( (isset($_POST['csrf_token'])) && (isset($_SESSION['csrf_token'])) ) { 

foreach($_POST as $postkey => $postvalue ) {
   if(is_string($postvalue)) { $_POST[$postkey] = mysqlescapestring($postvalue); }
   elseif(is_array($postvalue)) {
     foreach($postvalue as $postarraykey => $postarrayvalue) {
       $_POST[$postkey][$postarraykey] = mysqlescapestring($postarrayvalue);
     }
   }
   else { die; }
}


$csrf_token= $_POST['csrf_token'];

if ($csrf_token == $_SESSION["csrf_token"]) {

unset($_SESSION["csrf_token"]);

$postit = $encrypt->decode($_POST['postit']); 

}
}
}




?>