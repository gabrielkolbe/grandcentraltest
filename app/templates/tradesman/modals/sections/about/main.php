<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

    $find = $db->prepare("SELECT * FROM sections WHERE slug='about'");
    $find->execute();
    $page= $find->fetch();

    $find = $db->prepare("SELECT * FROM section_features WHERE slug='about'");
    $find->execute();
    $feature= $find->fetch();

?>
<form method="post" accept-charset="utf-8">

<input name="postit" type="hidden" value="<?php echo $encrypt->encode('edit_main'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="about">

<fieldset>

<div class="form-check form-switch" >
<input class="form-check-input float-end" name="displaymenu" type="checkbox"  id="displaymenu" style="height:40px; width:80px;"<?php if($page['displaymenu'] == 'yes') { echo 'checked'; } ?>>
</div>
<BR>
<div class="mb-3">             
<label class="float-end" for="name">Show in Menu</label>
</div>
<BR>

<div class="mb-3">
<label for="menu">Name in Menu</label>
<input type="text" name="menu" class="form-control" value="<?php echo $page['menu']; ?>"/>
<small>* Will display in the title tabs and in the browser tab</small>
</div>

<div class="mb-3">
<label for="name">Title</label>
<input type="text" name="name" class="form-control" value="<?php echo $page['name']; ?>"/>
</div>

<div class="mb-3">
<label for="heading">Heading</label>
<input type="text" name="heading" class="form-control" value="<?php echo $feature['heading']; ?>"/>
</div>

<div class="mb-3">
<label for="content">Description <span id="count">(1000 characters)</span></label>
<?php $content = str_replace("<br />", "\r\n", $feature['content']); ?>
<textarea name="content" id="content" class="form-control" rows="8" width="100%" placeholder="content"><?php echo $content; ?></textarea>
 </div>
 
<script>
document.getElementById('content').onkeyup = function() {document.getElementById('count').innerHTML = (1000-this.value.length)+" characters left: ";};
</script>

</fieldset>

<button class="btn btn-primary float-end" type="submit">Submit</button> 
</form>