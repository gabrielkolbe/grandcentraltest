<?php


if(file_exists($_SERVER["DOCUMENT_ROOT"]."/app/templates/".APP."/sections/".SLUR."_func.php")){
   include($_SERVER["DOCUMENT_ROOT"]."/app/templates/".APP."/sections/".SLUR."_func.php"); 
}

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/app/templates/".APP."/sections/".SLUR."_header.php")){
   include($_SERVER["DOCUMENT_ROOT"]."/app/templates/".APP."/sections/".SLUR."_header.php"); 
}

include ($_SERVER["DOCUMENT_ROOT"]."/app/templates/".APP."/sections/".SLUR.".php");  


?>