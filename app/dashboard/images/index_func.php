<?php

//################################################################################## 

if($postit == "delete_image") {
  
  $image_id = $encrypt->decode($_POST['id']);
  $findone = $db->prepare("SELECT * FROM images WHERE id='".$image_id."'");
  $findone->execute();
  $result = $findone->fetch();
  
  if($result) {
  
  $original = $result['original'];
  $image_name = $result['name'];
  $thumb = $result['thumb'];

  
  $sql = 'DELETE FROM images WHERE id = :id';
  $statement = $db->prepare($sql);
  $statement->bindParam(':id', $image_id, PDO::PARAM_INT);

  // execute the statement
  if ($statement->execute()) {
  
        $update = [
          'image_id' => $image_id,          
        ];
        
        $sql = "UPDATE slider_images SET image_id=NULL WHERE image_id=:image_id";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
        
        $sql = "UPDATE page_features SET image_id=NULL WHERE image_id=:image_id";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
        
        $sql = 'DELETE FROM products_images WHERE image_id = :image_id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':image_id', $image_id, PDO::PARAM_INT);
        $statement->execute();
        
        if(file_exists(UPLOADIMG.$image_name)){
          unlink(UPLOADIMG.$image_name);
        }
        if(file_exists(UPLOADIMG.$thumb)){
          unlink(UPLOADIMG.$thumb);
        }

  }
 }
 } 
 
 //##################################################################################
 
 
    $find = $db->prepare("SELECT * FROM `images` ORDER BY id DESC");
    $find->execute();
    $results = $find->fetchAll();
 
?>