<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;


$slug = $_GET['slug']; 

$find = $db->prepare("SELECT * FROM pages WHERE slug='".$slug."'");
$find->execute();
$page = $find->fetch();

?>
 
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_page'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="<?php echo $slug; ?>">
<h1>Delete this page will make loose all information on it.</h1>           
<label><?php echo $page['name']; ?></label>

<BR><BR>
<button class="btn btn-danger" type="submit" id="btn">Are you sure you want to delete this page?</button> 
 </form>          