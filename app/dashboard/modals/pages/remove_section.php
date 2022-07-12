<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

$page = $_GET['slug'];
$section_slug = $_GET['section'];  

$find = $db->prepare("SELECT * FROM page_sections WHERE page='".$page."' AND section_slug = '".$section_slug."'");
$find->execute();
$section = $find->fetch();

    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('remove_section'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="<?php echo $page; ?>">
<input name="section" type="hidden" value="<?= $section['section_slug'] ?>">
<h1>Removing section <?= $section['section_name'] ?>?</h1> 
<button class="btn btn-danger float-end" type="submit" id="btn">Remove</button> 
</form>          