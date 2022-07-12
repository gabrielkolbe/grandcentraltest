<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf; 

$slug = $_GET['slug']; 

$find = $db->prepare("SELECT * FROM pages WHERE slug='".$slug."'");
$find->execute();
$page= $find->fetch();

$find = $db->prepare("SELECT * FROM page_features WHERE slug='".$slug."'");
$find->execute();
$feature = $find->fetch();


    ?>
 
<form method="post" accept-charset="utf-8">

<input name="postit" type="hidden" value="<?php echo $encrypt->encode('editpage'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="<?php echo $slug; ?>">

<fieldset>

<div class="form-check form-switch" >
<input class="form-check-input float-end" name="displaypage" type="checkbox"  id="displaypage" style="height:40px; width:80px;"<?php if($page['displaymenu'] == 'yes') { echo 'checked'; } ?>>
</div>
<BR>
<div class="mb-3">             
<label class="float-end" for="name">Show in Menu</label>
</div>
<BR>

<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $page['name']; ?>"/>
<small>* Will display in the menu tabs and in the browser tab</small>
</div>

<div class="mb-3">
<label for="menu">Name on Menu</label>
<input type="text" name="menu" class="form-control" value="<?php echo $page['menu']; ?>"/>
</div>

<div class="mb-3">
<label for="heading">Heading</label>
<input type="text" name="heading" class="form-control" value="<?php echo $feature['heading']; ?>"/>
<small>Leave empty if not needed</small>
</div>

<div class="mb-3">
<label for="strapline">Search Engine Meta Description <span id="count">(300 characters)</span></label>
<textarea name="metadescrip" id="metadescrip" class="form-control" rows="2" width="100%" placeholder="Meta Description"><?php echo $page['metadescrip']; ?></textarea>
</div>


<script>
document.getElementById('metadescrip').onkeyup = function() {document.getElementById('count').innerHTML = (300-this.value.length)+" characters left: ";};
</script> 

<div class="mb-3">
<label for="keywords">Search Engine Keywords</label>
<textarea name="keywords" id="keywords" class="form-control" rows="2" width="100%" placeholder="Meta Keywords"><?php echo $page['keywords']; ?></textarea>
</div>


</fieldset>
<button class="btn btn-primary float-end" type="submit">Submit</button> 
</form>          