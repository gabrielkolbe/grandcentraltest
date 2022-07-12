<?php
session_unset();
session_start(); 
$_SESSION["message"] = "You are logged out of this site"; 
header ("location: /home"); 
exit();     
          
?>