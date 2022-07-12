<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

    $id = $encrypt->decode($_GET['id']);

    $find = $db->prepare("SELECT * FROM section_parts WHERE id='".$id."'");
    $find->execute();
    $review = $find->fetch();

if($review['image_id'] == '') { 
?>
  
<form method="post" enctype="multipart/form-data" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('add_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input name="slug" type="hidden" value="reviews"> 
           
<fieldset>
<h1>Review photo</h1>

<div class="mb-3">
<label for="image">Add a photo</label>
<input type="file" name="image" class="form-control" onchange="validate(this.value)">
<input name="imgsizew" type="hidden" value="800">
<input name="imgsizeh" type="hidden" value="400">
<input name="imgsizep" type="hidden" value="w">
<input name="oldimg" type="hidden" value="<?php echo $feature['image_id']; ?>">
<small>Tip: Landscape photo will work best (will be resized to max width 800px)</small>
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
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input name="slug" type="hidden" value="reviews"> 
<label>Delete your current image before uploading a new one?</label>
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