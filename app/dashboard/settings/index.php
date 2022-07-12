
<form method="post" accept-charset="utf-8">

    <input name="postit" type="hidden" value="<?php echo $encrypt->encode('sitesettings'); ?>">
    <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

    <fieldset>
    
        <h4>Helping search engines to find you</h4>
        <BR>
        <div class="mb-3">
            <label for="title">Global Page Title</label>
            <input type="text" name="title" class="form-control" placeholder="The Trademan's Website" value="<?php echo $result['title']; ?>"/>
            <small>* Will display in the title tabs and in the browser tab</small>
        </div>
        <div class="mb-3">
            <label for="keywords">Meta SEO Keywords</label>
            <input type="keywords" name="keywords" class="form-control" placeholder="tradesman, website, tradesman website, safe website, plumber website, electrician website, handy man" value="<?php echo $result['keywords']; ?>"/>
        </div> 
        <div class="mb-3"> 
            <label for="contentdesc">Meta SEO Description <span id="count">(100 characters)</span></label>
            <textarea name="contentdesc" class="form-control" id="contentdesc" rows="2" placeholder="SEO Description"><?php echo $result['contentdesc']; ?></textarea>
        </div>
<script>
document.getElementById('contentdesc').onkeyup = function() {document.getElementById('count').innerHTML = (100-this.value.length)+" characters left: ";};
</script> 

        
        </fieldset>
        <div class="mb-3">
        <button class="btn btn-primary float-end" type="submit">Submit</button> 
        </div>           
</form>