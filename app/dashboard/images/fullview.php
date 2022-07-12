
<a href="/dashboard/images_add" class="btn btn-primary" >Add an image</a>
<BR>
<div class="card">

<p>
<?php if(isset($result['label'])) { ?>
<BR>
<label>slider label:</label> <?php echo $result['label']; ?><BR>
<label>slider tagline:</label> <?php echo $result['tagline']; ?><BR>
<?php } ?>  </p>

<label>alt tags:</label> <?php echo $result['alttags']; ?><BR>
<?php echo $result['width']; ?>px wide & <?php echo $result['height']; ?>px heigh</p>  
<div class="row">
    <div class="col-md-12">
            <img src="<?php echo IMAGEPATH.$result['name']; ?>" width="<?php echo $result['width']; ?>px" alt="<?php echo $result['alttags']; ?>">
    </div>
</div>

</div>


