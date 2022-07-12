<?PHP

$filename = 'googlesitemap.xml';

if(file_exists($filename)){
  unlink($filename);
}


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

include ('app/engine/sitemap/googlesitemap_query.php');
//$somecontent =strip_tags($somecontent);
//$somecontent = eregi_replace("/","",$somecontent);
$somecontent = stripslashes($somecontent);

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
         $returnmessage = "Cannot open file ($filename)";
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        $returnmessage =  "Cannot write to file ($filename)";
    }

  $returnmessage =  "The sitemap has been created";


} else {
   $returnmessage =  "The file $filename is not writable";
}


