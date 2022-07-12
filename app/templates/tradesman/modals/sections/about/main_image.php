<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

    $find = $db->prepare("SELECT * FROM section_features WHERE slug='about'");
    $find->execute();
    $section = $find->fetch();
        
if($section['image_id'] == '') { 
?>
   
<form method="post" enctype="multipart/form-data" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('add_main_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="about"> 
           
<fieldset>
<h1>Upload image</h1>
<BR>
<div class="mb-3">
<label for="image">Add a image</label>
<input type="file" name="image" class="form-control" onchange="validate(this.value)">
<input name="imgsizew" type="hidden" value="650">
<input name="imgsizeh" type="hidden" value="670">
<input name="imgsizep" type="hidden" value="h">
<input name="imagethumb" type="hidden" value="160">
<input name="oldimg" type="hidden" value="<?php echo $section['image_id']; ?>">
<small>Better to use a portrait image, will be resized to 550w x 670h (px)</small>
<small style="color:red" id="warning">Only .png, jpg, jpeg and gif images are allowed</small>
</div>

<div class="mb-3">
<label for="alttags">Photo alt tags</label>
<input type="text" name="alttags" class="form-control" placeholder="What you want a search engine to find"/>
</div>


</fieldset>


<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          

<?php } else { ?>
  
<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_main_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input name="slug" type="hidden" value="about"> 

<label>Delete your current image before uploading a new one?</label><BR>
<small>Images will still be available in the image library</small>
<BR><BR>          
<button class="btn btn-danger" type="submit" id="btn">Delete image</button> 
 </form> 
<?php } ?>         


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