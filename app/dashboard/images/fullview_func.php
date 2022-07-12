<?php


if (!empty($_GET["slug"])) { $imgid = $encrypt->decode($_GET["slug"]); 

    $find = $db->prepare("SELECT * FROM images WHERE id='".$imgid."'");
    $find->execute();
    $result = $find->fetch();
    
}
?>



