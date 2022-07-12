
<form method="post" accept-charset="utf-8">

    <input name="postit" type="hidden" value="<?php echo $encrypt->encode('business_settings'); ?>">
    <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

    <fieldset>

        <div class="mb-3">
            <label for="title">Business Name</label>
            <input type="text" name="businessname" class="form-control" value="<?php echo $result['businessname']; ?>"/>
            <small>* Business name, displays in emails, site footer etc</small>
        </div>
        
    <div class="mb-3">
            <label for="title">Business Telephone</label>
            <input type="text" name="businesstelephone" class="form-control" value="<?php echo $result['businesstelephone']; ?>"/>
            <small>* Business name, displays in emails, site footer etc</small>
        </div>
        
    <div class="mb-3">
            <label for="email">Business Email</label>
            <input type="text" name="businessemail" class="form-control" value="<?php echo $result['businessemail']; ?>"/>
            <small>* default email where all contact with the site will be sent to</small>
        </div>
        
    <div class="mb-3">
            <label for="availablehours">Available Hours</label>
            <input type="text" name="availablehours" class="form-control" placeholder="8am - 6pm" value="<?php echo $result['availablehours']; ?>"/>
            <small>* Can appears in the Top Bar of the website</small>
        </div>

        <div class="mb-3">
            <label for="availabledays">Available Days</label>
            <input type="text" name="availabledays" class="form-control" placeholder="Mondays - Saturdays" value="<?php echo $result['availabledays']; ?>"/>
            <small>* Can appears in the Top Bar of the website</small>
        </div>
        
      <div class="mb-3">
            <label for="availability">Availability</label>
            <?php $availability = str_replace("<br />", "\r\n", $result['availability']); ?>              
            <textarea name="availability" class="form-control"  rows="2"><?php echo $availability; ?></textarea>
            <small>* Appears in the Footer of the website</small>
        </div>

        <div  class="mb-3">    
            <label for="businessaddress">Business Address (200 characters)</label>
            <?php $businessaddress = str_replace("<br />", "\r\n", $result['businessaddress']); ?>              
            <textarea name="businessaddress" class="form-control"  rows="2"><?php echo $businessaddress; ?></textarea>
            <small>* Business name, displays in emails, site footer etc</small>
        </div>

        <div  class="mb-3">    
            <label for="googlemap">Google map link</label>            
          <textarea name="googlemap" class="form-control" id="googlemap" rows="5" width="100%"><?php echo $result['googlemap']; ?></textarea>
          <small> example: https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13968.328942151973!2d-1.5933253251176744!3d51.764579108128785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4871338ee01c878f%3A0xcf09408e270cabba!2sCarterton%20Gymnastics%20Club%20-%20Oxfordshire!5e0!3m2!1sen!2suk!4v1648808256966!5m2!1sen!2suk </small><BR>
            <small>Leave empty to not display anything</small>
        </div>
        
        
        </fieldset>

        <button class="btn btn-primary float-end" type="submit">Submit</button> 
            
    </form>
