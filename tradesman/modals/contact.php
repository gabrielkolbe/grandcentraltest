<?php
include ($_SERVER["DOCUMENT_ROOT"]."/app/setup.php");
$csrf = RandomString(128);
$_SESSION['csrf_token'] = $csrf;
    
?>
<div class="col-md-12">

<h2>Contact Us</h2>
    
<form method="post" action="contact" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('contactus'); ?>">
<input name="subject" type="hidden" value="Messsage from Web contact form">
<input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>" />
           
						<div class="row text-start">
							<div class="name-group col-md-6 col-12 form-group">
								<div class="form-group-inner">
									<label for="cname">Name</label>
									<input type="text" class="form-control" id="cname" name="name" placeholder="Your name" minlength="2"  aria-required="true" required>
								</div>
							</div><!--//name-group-->
							<div class="email-group col-md-6 col-12 form-group">
								<div class="form-group-inner">
									<label for="cemail">Email</label>
									<input type="email" class="form-control" id="cemail" name="email" placeholder="Your email address" aria-required="true" required>
								</div>
							</div><!--//email-group-->

							<div class="message-group col-12 form-group">
								<div class="form-group-inner">
									<label for="cmessage">Your project &amp; additional info</label>
									<textarea class="form-control" id="cmessage" name="message" rows="6" placeholder="Enter your project info here..."  required></textarea>
								</div>
							</div><!--//message-group-->
              

            <div class="name-group col-md-6 col-12 form-group">
								<div class="form-group-inner">
                <BR>                
                <img src="styles/captcho.php?rand=<?php echo rand();?>" id='captchaimg' width="60%">
          
              <p>Can't read the image? click <a href='javascript: refreshCaptcha();' style="color:#F00;">here</a> to refresh</p>  
              
              <script type='text/javascript'>
                  function refreshCaptcha()
                  {
                      var img = document.images['captchaimg'];
                      img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                  }
              </script>
								</div>
							</div><!--//name-group-->
							<div class="email-group col-md-6 col-12 form-group">
								<div class="form-group-inner">
									<label for="captcha">Please fill in the captcha</label>
									<input type="captcha" class="form-control" name="code_captcha">
								</div>
							</div><!--//email-group-->
              
              
							<div class="col-12 form-group">
								<button type="submit" class="btn btn-block btn-theme-primary btn-cta">Submit</button>
							</div> 
						</div><!--//row-->
					</form><!--//contact-form-->         
</div>