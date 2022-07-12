    <form method="post" accept-charset="utf-8">
        <input name="postit" type="hidden" value="<?php echo $encrypt->encode('adjust_colours'); ?>">
        <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

<div class="color_picker_dialog" draggable="false">
  <div class="hue_bar">
      <div class="hue_picker">  </div>
  </div>
  <div class="sat_rect" draggable="false">
      <div class="white"></div>
      <div class="black"></div>
      <div class="sat_picker"></div>
  </div>
  <div class="bottom">
      <div class="color_preview"></div>
      <input type="text" onkeyup="changeHex(this.value)" value="#FF0000" />
  </div>
</div>



<div class="mb-3">
  <h3>Select colours for the following sections</h3>
  <small style="color:red">Reset browser cache after each colour change to see the colour change <BR>
  (Ctrl + Shift + Delete -> Cached images and files -> Clear data)</small>
  <BR><BR>
</div>  
  
<div class="mb-3">
  <label>Social media icon background, icons, 'View our projects-  button', 'Visit our shop - button'</label><BR>  
  <input type="text" name="buttons" value="<?php echo $colours['buttons']; ?>" data-coloris><BR>  
  <small>Default colour:#2f7ddb</small>
</div>

<div class="mb-3">
  <label>'Get a FREE quote' - button, 'Contact us'-  button</label><BR>  
  <input type="text" name="buttons2" value="<?php echo $colours['buttons2']; ?>" data-coloris><BR>  
  <small>Default colour:#00c85d</small>
</div>


<div class="mb-3">
  <label>Topbar Section</label><BR>  
  <input type="text" name="topbar" value="<?php echo $colours['topbar']; ?>" data-coloris><BR>  
  <small>Default colour:#2064b7</small>
</div>

<div class="mb-3">
  <label>Logo & branding Section</label><BR>    
  <input type="text" name="logobar" value="<?php echo $colours['logobar']; ?>" data-coloris> <BR>  
  <small>Default colour:#fff</small>
</div>

<div class="mb-3">
  <label>My Services Section</label><BR>    
  <input type="text"name="myservices" value="<?php echo $colours['myservices']; ?>" data-coloris><BR>  
  <small>Default colour:#fff</small>
</div>

<div class="mb-3">
  <label>Why Choose Us? Section</label> <BR>   
  <input type="text" name="whyus" value="<?php echo $colours['whyus']; ?>" data-coloris> <BR>  
  <small>Default colour:#2f7ddb</small>
</div>

<div class="mb-3">
  <label>Reviews Section</label> <BR>   
  <input type="text" name="reviews" value="<?php echo $colours['reviews']; ?>" data-coloris> <BR>  
  <small>Default colour:#1c59a2</small>
</div>

<div class="mb-3">
  <label>About Section</label> <BR>   
  <input type="text" name="about" value="<?php echo $colours['about']; ?>" data-coloris> <BR>  
  <small>Default colour:#f5f5f5</small>
</div>


<div class="mb-3">
  <label>Hiring Section</label> <BR>   
  <input type="text" name="hiring" value="<?php echo $colours['hiring']; ?>" data-coloris> <BR>  
  <small>Default colour:#2f7ddb</small>
</div>

<div class="mb-3">
  <label>Projects Section</label> <BR>   
  <input type="text" name="projects" value="<?php echo $colours['projects']; ?>" data-coloris> <BR>  
  <small>Default colour:#f5f5f5</small>
</div>

<div class="mb-3">
  <label>Shop Section</label> <BR>   
  <input type="text" name="shop" value="<?php echo $colours['shop']; ?>" data-coloris> <BR>  
  <small>Default colour:#fff</small>
</div>

<div class="mb-3">
  <label>FAQ Section</label> <BR>   
  <input type="text" name="faq" value="<?php echo $colours['faq']; ?>" data-coloris> <BR>  
  <small>Default colour:#f5f5f5;</small>
</div>

<div class="mb-3">
  <label>Contact Section</label> <BR>   
  <input type="text" name="contact" value="<?php echo $colours['contact']; ?>" data-coloris> <BR>  
  <small>Default colour:#2f7ddb</small>
</div>

<div class="mb-3">
  <label>Bottom Address Section</label> <BR>   
  <input type="text" name="bottomaddress" value="<?php echo $colours['bottomaddress']; ?>" data-coloris> <BR>  
  <small>Default colour:#113560</small>
</div>

<div class="mb-3">
  <label>Bottom Section</label> <BR>   
  <input type="text" name="bottom" value="<?php echo $colours['bottom']; ?>" data-coloris> <BR>  
  <small>Default colour:#0d294b</small>
</div>


<button class="btn btn-primary float-end" type="submit">Submit</button>         
</form> 

