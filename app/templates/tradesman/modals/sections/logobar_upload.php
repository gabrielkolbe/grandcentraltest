<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
include ($_SERVER["DOCUMENT_ROOT"]."/app/templates/tradesman/theme.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

?>
<h1>Upload a logo</h1>
<form method="post" enctype="multipart/form-data" accept-charset="utf-8">

<input name="postit" type="hidden" value="<?php echo $encrypt->encode('uploadlogo'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
<div class="mb-3">
<label for="image">Image required</label>
<input type="file" name="image" class="form-control" onchange="validate(this.value)" id="image1">
<input name="imgsizew" type="hidden" value="300">
<input name="imgsizeh" type="hidden" value="<?php echo LOGOHEIGHT; ?>">
<input name="imgsizep" type="hidden" value="h">
<input name="imagethumb" type="hidden" value="160">
<small style="color:red" id="warning">Only .png, jpg, jpeg and gif images are allowed</small>
<small>This logo will be resized to a maximum height of <?php echo LOGOHEIGHT; ?>px heigh</small><BR>
<BR>
</div>
<div class="mb-3">
<label for="alttags">Image SEO tags</label>
<input type="text" name="alttags" class="form-control"  value=""/>
</div>  

<div class="logoideas">
<div class="mb-3">
<label for="label">Logo Radius in %</label>
<input type="text" name="logoradius" class="form-control" />
<small>Round the image corners,  50% is a circle (use ONLY numbers)</small>
</div>  

<button class="btn btn-primary float-end" type="submit">Submit</button> 

</form>

<script>

$("#warning").hide();

   function validate(filename) {
        var extension = filename.replace(/^.*\./, '');
                
        if (extension == filename) {
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }

        if (extension == 'jpg') {
               $("#warning").hide();
               $("#btn").show();
        } else if (extension == 'jpeg') {
               $("#warning").hide();
               $("#btn").show();
        } else if (extension == 'png') {
                $("#warning").hide();
                $("#btn").show();
        } else if (extension == 'gif') {
                $("#warning").hide(); 
                $("#btn").show();
        } else {
          $("#warning").show();
          $("#btn").hide();
        }
   }  
</script>
