<?PHP


$find = $db->prepare("SELECT * FROM crons WHERE updated >= (NOW() - INTERVAL 1 MONTH) AND cron_name = 'sitemap''");
$find->execute();
$cron = $find->fetch();


if($cron == TRUE){

$filename = 'sitemap.xml';

$delete = @unlink($filename);
if (@file_exists($filename))
{
  $filesys = eregi_replace("/","\\",$filename);
  $delete = @system("del $filesys");
  if (@file_exists($filename))
  {
    $delete = @chmod ($filename, 0775);
    $delete = @unlink($filename);
  	$delete = @system("del $filesys");
  }
}


 //the filename

//make the file, if it exists it will overwrite it
$fp = fopen($filename,"w") or die ("Error Opening File");

$somecontent = '<?xml version="1.0" encoding="UTF-8"?&#62;<urlset xmlns="http://www.google.com/schemas/sitemap/0.90">';

$find = $db->prepare("SELECT * FROM pages");
$find->execute();
$crons = $find->fetchAll(); 


foreach ($crons as $cro){
$somecontent .= '
  <url>
    <loc>http://www.'.DOMAIN.'/'.$cro["slug"].'</loc>
    <lastmod>'.date("Y-m-d").'</lastmod>
    <priority>0.5</priority>
  </url>';
}

$somecontent .= '</urlset>';	

//$somecontent =strip_tags($somecontent);
//$somecontent = eregi_replace("/","",$somecontent);
$somecontent = stripslashes($somecontent);

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

   // echo "Success, wrote ($somecontent)";
   
      $update = [
      'updated' => date("Y-m-d"),
      'cron_name' => 'sitemap',         
      ];
      
      $sql = "UPDATE crons SET updated=:updated WHERE cron_name=:cron_name";
      $stmt= $db->prepare($sql);
      $stmt->execute($update);


    fclose($handle);

} else {
    echo "The file $filename is not writable";
}


  
  }