<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

$find = $db->prepare("SELECT * FROM section_types ORDER BY name ASC");
$find->execute();
$sections = $find->fetchAll();
    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('addasection'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
           
<fieldset>
<h1>Add another duplicate section</h1>
<small>Which can be used on another page</small>
<BR>
<BR>
<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" class="form-control"/>
</div> 

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