<?php

if($postit == "assignlogos") {

    $logo_id = $encrypt->decode($_POST['logo']);
    $favicon_id = $encrypt->decode($_POST['favicon']);
    
    $find = $db->prepare("SELECT * FROM images WHERE id='".$logo_id."'");
    $find->execute();
    $result = $find->fetch();
    $logo = $result['name'];
    
    $find = $db->prepare("SELECT * FROM images WHERE id='".$favicon_id."'");
    $find->execute();
    $result = $find->fetch();
    $favicon = $result['name'];
    
      $update = [
        'logo' => $logo,
        'favicon' => $favicon,
        'id' => 1,           
      ];
      
      $sql = "UPDATE settings SET logo=:logo, favicon=:favicon WHERE id=:id";
      $stmt= $db->prepare($sql);
      $stmt->execute($update);

 
    $_SESSION['message']="The logo and favicon has been assigned";
    header ("location: /dashboard/images"); 
    exit();

}


include (APP."/theme.php");

    $find = $db->prepare("SELECT * FROM images ORDER BY id DESC");
    $find->execute();
    $images = $find->fetchAll();
    
    $find = $db->prepare("SELECT logo, favicon FROM settings WHERE id=1");
    $find->execute();
    $result = $find->fetch();

    $currentlogo = $result['logo'];
    $currentfavicon = $result['favicon'];


?>



