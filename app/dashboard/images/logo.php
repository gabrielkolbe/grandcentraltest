<form method="post" enctype="multipart/form-data" accept-charset="utf-8">

          <input name="postit" type="hidden" value="<?php echo $encrypt->encode('assignlogos'); ?>">
          <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

          <div class="mb-3">
            <label>Select a logo</label>             
            <select name="logo" class="form-control">
            <option value="">SELECT ONE</option>
            <?php foreach($images as $image) { ?>
            <option value="<?php echo $encrypt->encode($image['id']); ?>" <?php  if ($image['name'] == $currentlogo) { echo "selected"; } ?>><?php echo $image['original']; ?>  - <?php echo $image['width']; ?> x <?php echo $image['height']; ?></option>
            <?php } ?>
            </select>
            <small>Select a logo - the ideal image will be <?php echo LOGOWIDTH; ?>px wide and <?php echo LOGOHEIGHT; ?>px high </small>
          </div>
           <BR>

           <div class="mb-3">
          <label>Select a favicon</label>             
            <select name="favicon" class="form-control">
            <option value="">SELECT ONE</option>
            <?php foreach($images as $image) { ?>
            <option value="<?php echo $encrypt->encode($image['id']); ?>" <?php  if ($image['name'] == $currentfavicon) { echo "selected"; } ?>><?php echo $image['original']; ?></option>
            <?php } ?>
            </select>
            <small>Select a favicon - image has to have a .ico extention </small>
          </div>
          

              <button class="btn btn-primary float-end" type="submit">Submit</button> 
   
     
      </form>
  
