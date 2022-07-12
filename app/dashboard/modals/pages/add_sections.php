<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

$page = $_GET['slug']; 
$list = "'empty',";
$find = $db->prepare("SELECT section_slug FROM page_sections WHERE  page='".$page."'");
$find->execute();
$current = $find->fetchAll();
foreach($current as $slug) {
$list .= "'".$slug['section_slug']."',";
}
$list = rtrim($list, "'',");
$list .= "'";

//echo $list;

$sql ="SELECT * FROM sections WHERE role = 'section' AND showit = 1 AND slug NOT IN(".$list.") ORDER BY name ASC";
//echo $sql;
$find = $db->prepare($sql);
$find->execute();
$sections = $find->fetchAll();
    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('addapagesection'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="<?php echo $page; ?>">
           
<fieldset>
<h1>Add a section to this page</h1>
<BR>
<BR>

<div class="mb-3">
<label>Sections</label><BR>
<select name="section" class="form-control">
<option value="">--Please choose an section--</option>
<?php foreach($sections as $section) { 
    echo "<option value='".$section['slug']."'>".$section['name']."</option>";
 } ?>
</select>                              
</div>



</fieldset>

<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          