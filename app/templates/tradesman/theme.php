<?php

$query = $db->prepare("SELECT * FROM settings");
$query->execute();
$setting = $query->fetch();

    define('NAME', $setting["businessname"]);
    define('TELEPHONE', $setting["businesstelephone"]);
    define('ADMINEMAIL', $setting["businessemail"]);
    define('ADDRESS', $setting["businessaddress"]);
    define('AVAILABLEHOURS', $setting["availablehours"]);
    define('AVAILABLEDAYS', $setting["availabledays"]);
    define('AVAILABILITY', $setting["availability"]);
    define('LOGO', $setting["logo"]);
    define('LOGORADIUS', $setting["logoradius"]);
    define('FAVICON', $setting["favicon"]);
    define('EMAILPASS', $setting['emailpass']); 
    define('LOGOHEIGHT', $setting['logoheight']);
    define('GOOGLEMAP', $setting['googlemap']);

$query = $db->prepare("SELECT name, link, icon FROM socialmedia WHERE link <> ''");
$query->execute();
$social = $query->fetchAll();

    define('SOCIAL', $social);

$find = $db->prepare("SELECT * FROM theme");
$find->execute();
$theme = $find->fetch();
define('SHOWTOPSOCIAL', $theme['topsocialbuttons']);
define('SHOWLOGOICONS', $theme['logobar_show_icons']);
define('SHOWLOGOTELMAIL', $theme['logobar_show_telemail']);
define('SHOWLOGOTIMEDAY', $theme['logobar_show_timeday']);


$find = $db->prepare("SELECT * FROM sections WHERE role = 'section' AND displaymenu = 'yes' ORDER BY rank ASC");
$find->execute();
$menusections = $find->fetchAll();
define('MENU', $menusections); 

$find = $db->prepare("SELECT * FROM pages WHERE displaymenu = 'yes' AND showit = '1' ORDER BY rank ASC");
$find->execute();
$pagesections = $find->fetchAll();
define('PAGEMENU', $pagesections); 

?>