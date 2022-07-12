<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

$find = $db->prepare("SELECT * FROM theme");
$find->execute();
$theme = $find->fetch();
    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('edit_hideshow'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
           
<fieldset>
<h1>Hide / Show Elements</h1>
 <BR>
<div class="mb-3">
<label>Hide / Show Social Media?</label><BR>
<input type="radio" id="yes" name="topsocialbuttons" value="yes" <?php if($theme['topsocialbuttons'] == 'yes') { echo 'checked'; } ?>> Yes<BR>
<input type="radio" id="no" name="topsocialbuttons" value="no" <?php if($theme['topsocialbuttons'] == 'no') { echo 'checked'; } ?>> No
</div>

</fieldset>

<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          