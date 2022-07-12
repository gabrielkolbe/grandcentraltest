<?php

############################# Don't have to do security checks on post as it is done in edit_func ########
if(!empty($_POST['postit'])) {

$postit = $encrypt->decode($_POST['postit']);

    if($postit == "edit_hideshow") {

      $topsocialbuttons = $_POST['topsocialbuttons'];

        $update = [
          'topsocialbuttons' => $topsocialbuttons,
        ];
        
        $sql = "UPDATE theme SET topsocialbuttons=:topsocialbuttons";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);

        $_SESSION['message']="The header has been updated";

  }
}

    $find = $db->prepare("SELECT * FROM colours");
    $find->execute();
    $colours = $find->fetch();
    
    
?>