<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;

    $id = $encrypt->decode($_GET['id']);

    $find = $db->prepare("SELECT * FROM blog_images WHERE blog_id='".$id."'");
    $find->execute();
    $image = $find->fetch();
    
   // var_dump($image);


if($image == false) { 
?>
  
<form method="post" enctype="multipart/form-data" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('add_blog_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
           
<fieldset>
<h1>Add a Image</h1>

<div class="mb-3">
<input type="file" name="image" class="form-control" onchange="validate(this.value)">
<input name="imgsizeh" type="hidden" value="600">
<input name="imgsizew" type="hidden" value="600">
<input name="imgsizep" type="hidden" value="r">
<small>Tip: Preferably not wider than 600px)</small>
<small style="color:red" id="warning">Only .png, jpg, jpeg and gif images are allowed</small>
</div>


<div class="mb-3">
<label for="alttags">Image alt tags</label>
<input type="text" name="alttags" class="form-control" placeholder="What you want a search engine to find"/>
</div>
</fieldset>
<button class="btn btn-primary float-end" type="submit" id="btn">Submit</button> 
</form>          



<?php } else { ?>

<form method="post" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_blog_image'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<h1>Delete Image</h1>
<small>Delete your current image before uploading a new one.</small>
<BR><BR>

<div class="mb-3">
<label>Delete this image also in the image library?</label> <BR>
<input type="radio" name="thisorall" value="this" checked> This image only<BR>
<input type="radio" name="thisorall" value="all"> All copies in the image library also
</div>
 <BR>   
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