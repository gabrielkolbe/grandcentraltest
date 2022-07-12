<?php 
    $findimg = $db->prepare("SELECT * FROM settings");
    $findimg->execute();
    $settings = $findimg->fetch();
    
    define('NAME', $settings['businessname']);
    define('ADDRESS', $settings['businessaddress']); 
?>