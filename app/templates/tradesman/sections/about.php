<?php if($section['displaymenu'] == 'yes') { ?><img src="/styles/images/unlock.png" alt="unlock" class="float-end" width="50px">  <?php } else { ?><img src="/styles/images/lock.png" alt="unlock" class="float-end" width="50px">  <?php } ?>
   
    <div class="mb-3">
    <a class = 'btn btn-primary btn-sm' onclick="return sendajax('/app/templates/tradesman/modals/sections/about/main.php');">edit</a>
    <BR>
    </div>
    
    <div class="row">
<div class="col-md-12">
<h2><?php echo $feature['heading']; ?></h2>
<BR>
<p><?php echo $feature['content']; ?></p>
</div>

<div class="col-md-12">
<a class = 'btn btn-info btn-sm' onclick="return sendajax('/app/templates/tradesman/modals/sections/about/main_image.php');">Image</a>
<BR>
<?php if($feature['image'] != '')  { ?>
      <BR>  
<div class="card">    
  <img src="<?php echo IMAGEPATH.$feature['image']; ?>" width="<?php echo $feature['width']; ?>" alt="<?php echo $feature['alttags']; ?>">
</div>
<?php } ?>
</div>
</div>    