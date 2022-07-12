<?PHP

include("{$_SERVER['DOCUMENT_ROOT']}/code/hideme321/conn/passsword.php");

$cronsql = "SELECT * FROM crons WHERE date < '".date('Y-m-d', strtotime('-1 Week'))."' AND cron_name = 'rssmap'";
$findcron = $db->getOne($cronsql);

if($findcron  >= 1){

$filename = 'rss.xml';

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

include ('code/crons/sitemap/rssmap_query.php');
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
 
  $update = new table($db, 'crons');
  $update->find($findcron);
  $update->date = date("Y-m-d");
  $update->save(); 
 
    fclose($handle);

} else {
    echo "The file $filename is not writable";
}


  
  }