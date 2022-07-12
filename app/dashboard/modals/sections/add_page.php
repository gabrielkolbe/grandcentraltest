<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;
    
?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('addapage'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
           
<fieldset>
<h1>Add another page</h1>
<BR>
<BR>
<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" class="form-control"/>
</div> 


<div class="mb-3">
<label for="strapline">Search Engine Meta Description <span id="count">(300 characters)</span></label>
<textarea name="metadescrip" id="metadescrip" class="form-control" rows="2" width="100%" placeholder="Meta Description"></textarea>
</div>


<script>
document.getElementById('metadescrip').onkeyup = function() {document.getElementById('count').innerHTML = (300-this.value.length)+" characters left: ";};
</script> 

<div class="mb-3">
<label for="keywords">Search Engine Keywords</label>
<textarea name="keywords" id="keywords" class="form-control" rows="2" width="100%" placeholder="Meta Keywords"></textarea>
</div>


</fieldset>

<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          