<?php

if($postit == "editalttags") {
  
    $err = '';
  	if ($_POST['alttags'] == ""){ $_SESSION['message']="Meta keywords is empty - "; }
    
    if($err != '') {
       $_SESSION['message'] = $err;
    } else {

    $name = $_POST['name'];
    $alttags = $_POST['alttags'];
    $image_id = $encrypt->decode($_POST['id']);


      $update = [
        'alttags' => $alttags,
        'original' => $name,
        'id' => $image_id,           
      ];
      
      $sql = "UPDATE images SET original=:original, alttags=:alttags WHERE id=:id";
      $stmt= $db->prepare($sql);
      if($stmt->execute($update)) {
        $_SESSION['message']="The image has been uploaded";
        header ("location: /dashboard/images"); 
        exit();
      }

   }
  }


if (!empty($_GET["slug"])) { $imgid = $encrypt->decode($_GET["slug"]); 

    $find = $db->prepare("SELECT * FROM images WHERE id='".$imgid."'");
    $find->execute();
    $result = $find->fetch();
    
    
    $label = '';
    if(isset($result['label']) ) { $label = $result['label']; }
    $tagline = '';
    if(isset($result['tagline']) ) { $label = $result['tagline']; }
    
}
?>



