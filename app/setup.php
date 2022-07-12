<?php

session_start();


include ($_SERVER["DOCUMENT_ROOT"]."/app/engine/dbconnect.php");

$current = $_SERVER['SERVER_NAME'];
$domains = explode('.', $current);
define('DOMAIN', $current);
define('OWNER', $domains['0']);


 define('DATABASE', 'test');
 define('APP', 'tradesman'); 
 define('IMG', 'test');

 define('HOST', 'localhost');
  define('PASSWORD', '');
  define('USER', 'root');
  define('CACHESITE', 'no');
  define('LOCKSITE', 'no');





$connect = new DatabaseConnect(HOST, USER, PASSWORD, DATABASE);

$db = $connect->db_connect();

include ($_SERVER["DOCUMENT_ROOT"]."/app/engine/helpers.php");

include($_SERVER["DOCUMENT_ROOT"]."/app/engine/encrypt.php");
$encrypt = new encrypt();


define('IMAGEPATH', '/images/'.IMG.'/');
define('UPLOADIMG', 'images/'.IMG.'/');


?>