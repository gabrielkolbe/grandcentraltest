<?php

############################# Don't have to do security checks on post as it is done in edit_func ########
if(!empty($_POST['postit'])) {  

$postit = $encrypt->decode($_POST['postit']);

if($postit == "edit_hideshow") {

  $logobar_show_telemail = $_POST['logobar_show_telemail'];
  $logobar_show_timeday = $_POST['logobar_show_timeday']; 
  $logobar_show_icons = $_POST['logobar_show_icons']; 

    $update = [
      'logobar_show_telemail' => $logobar_show_telemail,
      'logobar_show_timeday' => $logobar_show_timeday,
      'logobar_show_icons' => $logobar_show_icons,
    ];
    
    $sql = "UPDATE theme SET logobar_show_telemail=:logobar_show_telemail, logobar_show_timeday=:logobar_show_timeday, logobar_show_icons=:logobar_show_icons";
    $stmt= $db->prepare($sql);
    $stmt->execute($update);

    $_SESSION['message']="The header has been updated";

}

  
if($postit == "uploadlogo") {

    
    $alttags = '';
    if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
    $logoradius = '0';
    if(isset($_POST['logoradius'])) { if(is_numeric($_POST['logoradius'])) { $logoradius = $_POST['logoradius']; } }
    
    
    $imgsizew = $_POST['imgsizew']; //desired w
    $imgsizeh = $_POST['imgsizeh'];  //desired h
    $imgsizep = $_POST['imgsizep'];  // priority
    $thumbwidth = '160';
    if(isset($_POST['imagethumb'])) {
      $thumbwidth = $_POST['imagethumb'];  // priority
    }
  
    include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
      
              
      $update = [
        'logo' => $uploaded_image,
        'logoradius' => $logoradius,
        'id' => 1,           
      ];
      
      $sql = "UPDATE settings SET logo=:logo, logoradius=:logoradius WHERE id=:id";
      $stmt= $db->prepare($sql);
      $stmt->execute($update);
              
         $_SESSION['message']="The logo has been uploaded";

}

}

    $find = $db->prepare("SELECT * FROM colours");
    $find->execute();
    $colours = $find->fetch();

    $findimg = $db->prepare("SELECT * FROM settings");
    $findimg->execute();
    $setting = $findimg->fetch();
?>