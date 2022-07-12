<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;


$slug = $_GET['slug']; 

$find = $db->prepare("SELECT * FROM sections WHERE slug='".$slug."'");
$find->execute();
$section = $find->fetch();

?>
 
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_section'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="<?php echo $slug; ?>">
<h1>Delete</h1>           
<label><?php echo $section['name']; ?></label>

<BR><BR>
<button class="btn btn-danger" type="submit" id="btn">Are you sure you want to delete this section?</button> 
 </form>          