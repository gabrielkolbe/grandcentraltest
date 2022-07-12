
<a href="/dashboard/images_add" class="btn btn-primary">Add an image</a>
<BR> <BR>
<div class="row">
<script>
function ConfirmDelete()
{
  return confirm("Are you sure you want to delete?");
}
</script>
<?php
$i = 1;
foreach($results as $img)  { ?>
    <div class="col-md-2">
    <div class="card">
    <p><?php echo $img['original']; ?></p>        
        <img src="<?php echo IMAGEPATH.$img['thumb']; ?>" width="<?php echo $img['width']; ?>" style="max-width: 100%;" alt="<?php echo $img['alttags']; ?>"><BR>
        <form method="POST" name="post_<?php echo $i; ?>">
        <input name="postit" type="hidden" value="<?php echo $encrypt->encode('delete_image'); ?>">
        <input name="id" type="hidden" value="<?php echo $encrypt->encode($img['id']); ?>">
        <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
        <a href="/dashboard/edit_image/<?php echo $encrypt->encode($img['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="#" class="w-10 btn btn-sm btn-danger" data-confirm-message="Deleting '<?php echo $img['original']; ?>' will remove it from all pages." onclick="if (confirm(this.dataset.confirmMessage)) { document.post_<?php echo $i; ?>.submit(); } event.returnValue = false; return false;">Delete</a>
        <a href="/dashboard/image_fullview/<?php echo $encrypt->encode($img['id']); ?>" class="btn btn-sm btn-primary" target="_blank">Full view</a><BR>
        <small><?php echo $img['height']; ?>px heigh, <?php echo $img['width']; ?>px wide</small>
        </form> 
    </div>
    </div>
<?php $i++; } ?>
</div>

