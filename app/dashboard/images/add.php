
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8">

        <input name="postit" type="hidden" value="<?php echo $encrypt->encode('addimage'); ?>">
        <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
        <div class="mb-3">
        <label for="image">Image required</label>
        <input type="file" name="image" class="form-control" onchange="validate(this.value)" id="image1">
        <input name="imgsizep" type="hidden" value="n">
        <input name="imagethumb" type="hidden" value="160">
        <small style="color:red" id="warning">Only .png, jpg, jpeg and gif images are allowed</small>
        <BR>
        </div>
        <div class="mb-3">
        <label for="alttags">Image SEO tags</label>
        <input type="text" name="alttags" class="form-control"  value=""/>
        </div>  
        
        <button class="btn btn-primary float-end" type="submit">Submit</button> 
      
      </form>
