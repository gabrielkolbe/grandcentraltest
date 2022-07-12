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
<label>Hide / Show Telephone Number and Email?</label><BR>
<input type="radio" id="yes" name="logobar_show_telemail" value="yes" <?php if($theme['logobar_show_telemail'] == 'yes') { echo 'checked'; } ?>> Yes<BR>
<input type="radio" id="no" name="logobar_show_telemail" value="no" <?php if($theme['logobar_show_telemail'] == 'no') { echo 'checked'; } ?>> No
</div>

<div class="mb-3">
<label>Hide / Show Times and Days?</label><BR>
<input type="radio" id="yes" name="logobar_show_timeday" value="yes" <?php if($theme['logobar_show_timeday'] == 'yes') { echo 'checked'; } ?>> Yes<BR>
<input type="radio" id="no" name="logobar_show_timeday" value="no" <?php if($theme['logobar_show_timeday'] == 'no') { echo 'checked'; } ?>> No
</div>

<div class="mb-3">
<label>Hide / Show Icons?</label><BR>
<input type="radio" id="yes" name="logobar_show_icons" value="yes" <?php if($theme['logobar_show_icons'] == 'yes') { echo 'checked'; } ?>> Yes<BR>
<input type="radio" id="no" name="logobar_show_icons" value="no" <?php if($theme['logobar_show_icons'] == 'no') { echo 'checked'; } ?>> No
</div>

</fieldset>

<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          