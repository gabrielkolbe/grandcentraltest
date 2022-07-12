<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;


$id = $encrypt->decode($_GET['id']); 

$find = $db->prepare("SELECT * FROM blogs WHERE id='".$id."'");
$find->execute();
$blog= $find->fetch();

?>
 
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_blog'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
<h1>Delete this blog will make loose all information on it.</h1>           
<label><?php echo $blog['name']; ?></label>

<BR><BR>
<button class="btn btn-danger" type="submit" id="btn">Are you sure you want to delete this blog?</button> 
 </form>          