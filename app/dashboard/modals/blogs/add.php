<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;
    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('addablog'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
           
<fieldset>
<h1>Add a Blog</h1>
<BR>
<BR>
<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" class="form-control"/>
</div>

<div class="mb-3">
<label for="heading">Heading</label>
<input type="text" name="heading" class="form-control"/>
 <small>* Appears on the blog page</small>
</div>  


</fieldset>

<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          