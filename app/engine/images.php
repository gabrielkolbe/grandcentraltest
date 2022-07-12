
<?php


class Images
{
   
   var $image;
   var $image_type;
   var $location;
   
    function uploadimage($location, $extention, $tmp, $newname) {
    // uploading initial file..
       $extention = $this->getext($extention);
      	if($extention <> ""){
      
            $file = $newname.".".$extention;
      			$uploadfile = $location.$file;
      
      				if (move_uploaded_file($tmp, $uploadfile)){
      				    return $file;  
      				}				
          }				
    }
    
function png2jpg($image) {
    $bg = imagecreatetruecolor(@imagesx($image), @imagesy($image));
    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
    imagealphablending($bg, TRUE);
    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    imagedestroy($image);
    $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
    $jpgimg = imagejpeg($bg, $filePath . ".jpg", $quality);
    imagedestroy($bg);
    return $jpgimg;
}                                    
  
 
   function reload($filename) {
   
      $image_info = getimagesize($filename);
      $this->image_type = $image_info["mime"];
      
      switch($this->image_type)
      {
          case "image/jpeg":
          case "image/jpg":
              $this->image = imagecreatefromjpeg($filename);
              break;
          
          case "image/png":
              $this->image = imagecreatefrompng($filename);
              // imagecreatefrompng($image);
              break;
          
          case "image/gif":
              $this->image = imagecreatefromgif($filename);
              break;

          case "image/vnd.microsoft.icon":
              $this->image = imagecreatefromgif($filename);
              break;
              
          case "image/bmp":
              $this->image = $this->imagecreatefrombmp($filename);
              break;
          
          default:
              die($this->image_type.' no file of this type found');
          
      }
      
   }
   
    function save($filename, $compression=100, $permissions=null) {
   
      switch($this->image_type)
      {
          case "image/jpeg":
          case "image/jpg":
              imagejpeg($this->image,$filename,$compression);
              break;
          
          case "image/png":
              imagepng($this->image,$filename);
              break;
          
          case "image/gif":
              imagegif($this->image,$filename);
              break;

          case "image/vnd.microsoft.icon":
              imagegif($this->image,$filename);
              break;
              
          case "image/bmp":
              imagejpeg($file, $photo_dest, 100);
              break;
          
      }
      
   }


   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
  
   
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   
    function maxsize($size) {
      $width = imagesx($this->image);
      $height = imagesy($this->image);
      if($height > $size) {
         $this->resizeToHeight($size);
      } elseif($width > $size) {
         $this->resizeToWidth($size);
      }
   }
   


   function resize($width,$height) {
  

        switch($this->image_type)
      {
          case "image/jpeg":
          case "image/jpg":
              $new_image = imagecreatetruecolor($width, $height);
              for($i=0; $i<256; $i++) { imagecolorallocate($new_image, $i, $i, $i); }
              imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
              $this->image = $new_image;   
              break;
          
          case "image/png":
              $new_image = imagecreatetruecolor($width, $height);
             // $background=imagecolorallocate($new_image, 255, 255, 255);
              //imagefill($new_image,0,0,$background);
              imagefill($new_image, 0, 0, imagecolorallocate($new_image, 255, 255, 255)); 
              imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
              $this->image = $new_image;
              break;
          
          case "image/gif":
              $new_image = imagecreatetruecolor($width, $height);
              $kek=imagecolorallocate($new_image, 255, 255, 255);
              imagefill($new_image,0,0,$kek);
              imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
              $this->image = $new_image;
              break;

          case "image/bmp":
              $new_image = imagecreatetruecolor($width, $height);
              for($i=0; $i<256; $i++) { imagecolorallocate($new_image, $i, $i, $i); }
              imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
              $this->image = $new_image;
              break;
          
          
      }
      
      
  
  }    
      
     function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }   
   }

  function croppng($size)
     {
        $image = $this->image;
        $im = imagecreatefrompng($image);
        $size = min(imagesx($im), imagesy($im));
        $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
        if ($im2 !== FALSE) {
            imagepng($im2, 'example-cropped.png');
            imagedestroy($im2);
        }
        imagedestroy($im);
     
     }
   
  function crop($width, $height)
     {
        $image = $this->image;
        $w = @imagesx($image); //current width

        $h = @imagesy($image); //current height
        if ((!$w) || (!$h)) { $GLOBALS['errors'][] = 'Image couldn\'t be resized because it wasn\'t a valid image.'; return false; }
        if (($w == $width) && ($h == $height)) { return $image; }  //no resizing needed
        $ratio = $width / $w;       //try max width first...
        $new_w = $width;
        $new_h = $h * $ratio;    
        if ($new_h < $height) {  //if that created an image smaller than what we wanted, try the other way
            $ratio = $height / $h;
            $new_h = $height;
            $new_w = $w * $ratio;
        }
        $image2 = imagecreatetruecolor ($new_w, $new_h);
        imagecopyresampled($image2,$image, 0, 0, 0, 0, $new_w, $new_h, $w, $h);    
        if (($new_h != $height) || ($new_w != $width)) {    //check to see if cropping needs to happen
            $image3 = imagecreatetruecolor ($width, $height);
            if ($new_h > $height) { //crop vertically
                $extra = $new_h - $height;
                $x = 0; //source x
                $y = round($extra / 2); //source y
                imagecopyresampled($image3,$image2, 0, 0, $x, $y, $width, $height, $width, $height);
            } else {
                $extra = $new_w - $width;
                $x = round($extra / 2); //source x
                $y = 0; //source y
                imagecopyresampled($image3,$image2, 0, 0, $x, $y, $width, $height, $width, $height);
            }
            imagedestroy($image2);
            $this->image = $image3;
        } else {
           $this->image = $image2;
        }
    }
    
    
function IsTransparentPng($File){
/* my comment: didn't seem to work..*/
    //32-bit pngs
    //4 checks for greyscale + alpha and RGB + alpha
    if ((ord(file_get_contents($File, false, null, 25, 1)) & 4)>0){
        return true;
    }
    //8 bit pngs
    $fd=fopen($File, 'r');
    $continue=true;
    $plte=false;
    $trns=false;
    $idat=false;
    while($continue===true){
        $continue=false;
        $line=fread($fd, 1024);
        if ($plte===false){
            $plte=(stripos($line, 'PLTE')!==false);
        }
        if ($trns===false){
            $trns=(stripos($line, 'tRNS')!==false);
        }
        if ($idat===false){
            $idat=(stripos($line, 'IDAT')!==false);
        }
        if ($idat===false and !($plte===true and $trns===true)){
            $continue=true;
        }
    }
    fclose($fd);
    return ($plte===true and $trns===true);
} 

  function getext($extention) {

      if( $extention == 'image/jpeg' ) {
         return 'jpg';
      } elseif( $extention == 'image/png' ) {
         return 'png';
      } elseif( $extention == 'image/gif' ) {
         return 'gif';
      } elseif( $extention == 'image/x-icon' ) {
         return 'gif';
      } else {
        return false;
      }
   }

/*    
    
    function makesquare() {
   
        $image = $this->image;
        $w = @imagesx($image); 
        $h = @imagesy($image);
        
        if ($h > $w) { 
          // increase w
          $newwidth = $h;
          $newheight = $h;
          $dst_x=$h/2;
          $dst_y=0;
        } elseif ($w > $h) { 
          // increase h
          $newheight = $w;
          $newwidth = $w;
          $dst_x=0;
          $dst_y=$w/2;
        } else {
          $w == $h;
          $dst_x=0;
          $dst_y=0;
          $newheight = $w;
          $newwidth = $w;
        }
                    
        $pct=100;
        
        $smaller_image_with_proportions=imagecreatetruecolor($w, $h);
        
        $final_image = imagecreatetruecolor($newwidth, $newwidth);
        $bg = imagecolorallocate ( $final_image, 255, 255, 255 );
        imagefilledrectangle($final_image,0,0,$newwidth,$newwidth,$bg);
        
        imagecopymerge($final_image,$smaller_image_with_proportions,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);
        
        imagecopyresampled($new_image,$image2, 0, 0, $x, $y, $width, $height, $width, $height);
    
        // destroy aux images (free memory)
        imagedestroy($smaller_image_with_proportions);
        imagedestroy($final_image);
        
        
        $this->image = $new_image;
        
            
   } 

   
   function square_thumbnail($src_file,$destination_file,$square_dimensions,$jpeg_quality=90)
{
    // Step one: Rezise with proportion the src_file *** I found this in many places.

    $src_img=imagecreatefromjpeg($src_file);

    $old_x=imageSX($src_img);
    $old_y=imageSY($src_img);

    $ratio1=$old_x/$square_dimensions;
    $ratio2=$old_y/$square_dimensions;

    if($ratio1>$ratio2)
    {
        $thumb_w=$square_dimensions;
        $thumb_h=$old_y/$ratio1;
    }
    else    
    {
        $thumb_h=$square_dimensions;
        $thumb_w=$old_x/$ratio2;
    }

    // we create a new image with the new dimmensions
    $smaller_image_with_proportions=ImageCreateTrueColor($thumb_w,$thumb_h);

    // resize the big image to the new created one
    imagecopyresampled($smaller_image_with_proportions,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 

    // *** End of Step one ***

    // Step Two (this is new): "Copy and Paste" the $smaller_image_with_proportions in the center of a white image of the desired square dimensions

    // Create image of $square_dimensions x $square_dimensions in white color (white background)
    $final_image = imagecreatetruecolor($square_dimensions, $square_dimensions);
    $bg = imagecolorallocate ( $final_image, 255, 255, 255 );
    imagefilledrectangle($final_image,0,0,$square_dimensions,$square_dimensions,$bg);

    // need to center the small image in the squared new white image
    if($thumb_w>$thumb_h)
    {
        // more width than height we have to center height
        $dst_x=0;
        $dst_y=($square_dimensions-$thumb_h)/2;
    }
    elseif($thumb_h>$thumb_w)
    {
        // more height than width we have to center width
        $dst_x=($square_dimensions-$thumb_w)/2;
        $dst_y=0;

    }
    else
    {
        $dst_x=0;
        $dst_y=0;
    }

    $src_x=0; // we copy the src image complete
    $src_y=0; // we copy the src image complete

    $src_w=$thumb_w; // we copy the src image complete
    $src_h=$thumb_h; // we copy the src image complete

    $pct=100; // 100% over the white color ... here you can use transparency. 100 is no transparency.

    imagecopymerge($final_image,$smaller_image_with_proportions,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);

    imagejpeg($final_image,$destination_file,$jpeg_quality);

    // destroy aux images (free memory)
    imagedestroy($src_img); 
    imagedestroy($smaller_image_with_proportions);
    imagedestroy($final_image);
}


 */
 

          
}
?>