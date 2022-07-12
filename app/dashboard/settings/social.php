<form method="post" accept-charset="utf-8">

    <input name="postit" type="hidden" value="<?php echo $encrypt->encode('socialmediaupdate'); ?>">
    <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

    <fieldset>
    
        <h4>Add links to your social media links</h4>
        <p>Only the filled in one's will display, once live on the site test them to check if you links work.</p>
        
        <?php foreach($socials as $media) {  ?>
    <div  class="mb-3"> 
            <label for="title"><i class="<?php echo $media['icon']; ?>"></i>  &nbsp; <?php echo $media['name']; ?></label>
            
            <input type="text" name="<?php echo $media['name']; ?>" class="form-control" value="<?php echo $media['link']; ?>"/>
        </div>
        <?php } ?>
        
        </fieldset>
        <div>

        <button class="btn btn-primary float-end" type="submit">Submit</button> 
        </div>
        <BR><BR><BR>           
</form>
