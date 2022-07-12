<?php
$folderlocation = APP."/cachedfiles/".IMG."/";

if (!is_dir($folderlocation)) {
    mkdir($folderlocation, 0777, true);
}


$scan = scandir($folderlocation);
foreach($scan as $file) {

   $ext = substr(strrchr($file, "."), 1); 
   if($ext == 'html'){
      unlink($folderlocation.$file);
  }
}
?>