<div class="row">
<?php foreach($icons as $icon) { ?>
<div class="col-md-2">
<label><?php echo $icon['name']; ?></label><BR><BR>
<span class="custom-icon icon-<?php echo $icon['code']; ?>"></span>
</div>
<?php } ?>
</div>