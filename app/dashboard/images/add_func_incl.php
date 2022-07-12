<?php

include("app/engine/images.php");

if(!isset($alttags)) { $alttags = ''; }
if(!isset($imgsizem)) { $imgsizem = 'resize'; }

$imgclass = new Images();

$type = $_FILES['image']['type'];
$tmp = $_FILES['image']['tmp_name'];
$original = $_FILES['image']['name'];
$newname = time();

$uploaded_image = $imgclass->uploadimage(UPLOADIMG, $type, $tmp, $newname);

 if($uploaded_image == true) {
 
      $getsize = getimagesize(UPLOADIMG.$uploaded_image);
      $width = $getsize['0'];
      $height = $getsize['1'];
      
      if($imgsizep == 'n') {
          //no resizing
          $imgclass->save(UPLOADIMG.$uploaded_image);
      }
      
      if($imgsizem == 'resize') {
          if($imgsizep == 'w') {
              if($width > $imgsizew)  {
                  $imgclass->reload(UPLOADIMG.$uploaded_image);
                  $imgclass->resizeToWidth($imgsizew);
                  $imgclass->save(UPLOADIMG.$uploaded_image);
            }
          }
          
          if($imgsizep == 'h') {
              if($height > $imgsizeh)  {
                  $imgclass->reload(UPLOADIMG.$uploaded_image);
                  $imgclass->resizeToHeight($imgsizeh);
                  $imgclass->save(UPLOADIMG.$uploaded_image);
            }
          }
    
          if($imgsizep == 'r') {
              $imgclass->reload(UPLOADIMG.$uploaded_image);
              $imgclass->resize($imgsizew, $imgsizeh);
              $imgclass->save(UPLOADIMG.$uploaded_image);
          }
          
       }
       
        if($imgsizem == 'crop') {
              $imgclass->reload(UPLOADIMG.$uploaded_image);
              $imgclass->crop($imgsizew, $imgsizeh);
              $imgclass->save(UPLOADIMG.$uploaded_image);
        }

       
      $getsize = getimagesize(UPLOADIMG.$uploaded_image);
      $width = $getsize['0'];
      $height = $getsize['1'];
      
      if($width > $thumbwidth) {
          $imgclass->reload(UPLOADIMG.$uploaded_image);
          $imgclass->maxsize($thumbwidth);
          $imgclass->save(UPLOADIMG.$thumbwidth.'_'.$uploaded_image);
      } else {
          $imgclass->reload(UPLOADIMG.$uploaded_image);
          $imgclass->save(UPLOADIMG.$thumbwidth.'_'.$uploaded_image);
      } 

      $imgdata = [
        'name' => $uploaded_image,
        'original' => $original,
        'thumb' => $thumbwidth.'_'.$uploaded_image,
        'alttags' => $alttags,
        'width' =>  $width,
        'height' => $height,
    ];
    
    $sql = "INSERT INTO images (name, original, thumb, alttags, width, height) VALUES (:name, :original, :thumb, :alttags, :width, :height)";
    $db->prepare($sql)->execute($imgdata); 
    
  $image_id = $db->lastInsertId();

 }
         
?>