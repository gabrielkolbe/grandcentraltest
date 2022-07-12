
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8">

          <input name="postit" type="hidden" value="<?php echo $encrypt->encode('editalttags'); ?>">
          <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
          <input name="id" type="hidden" value="<?php echo $encrypt->encode($result['id']); ?>">
          <div class="mb-3">
              <label for="image1">Image Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $result['original']; ?>"/> 
            </div> 
            <BR> 
            <div class="mb-3">
              <label for="image1">Alt Tags for Image</label>
              <input type="text" name="alttags" class="form-control" id="alttags" value="<?php echo $result['alttags']; ?>"/>
               <small>* Important for SEO optimisation</small>
            </div>
            

              <button class="btn btn-primary float-end mt-20" type="submit">Submit</button> 

          
              <div class="mb-3">
          <BR>  <BR><?php echo $result['width']; ?>px wide and <?php echo $result['height']; ?>px high <BR>
            <img src="<?php echo IMAGEPATH.$result['name']; ?>" width="<?php echo $result['width']; ?>px" alt="<?php echo $result['alttags']; ?>">
          </div>         
      </form>

