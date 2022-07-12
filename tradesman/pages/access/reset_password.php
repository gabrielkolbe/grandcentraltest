<div class="col-sm-4">
<!--i-->  
</div>
<div class="col-sm-4">
<h2>Reset Password</h2>
<form method="post" class="contact-form" accept-charset="utf-8">    
<input name="postit" type="hidden" value="<?php echo $encrypt->encode('request_password'); ?>">
<input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />

		<div class="row text-start">

         <p>Registered email address</p>
         
         		<div class="email-group col-12 form-group">
								<div class="form-group-inner">
									<label for="cemail">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Your email address" aria-required="true" required>
								</div>
							</div><!--//email-group-->

						<div class="col-md-6 col-12 form-group"> 
                <img src="/styles/captcho.php?rand=<?php echo rand();?>" id='captchaimg' width="100%">
          
              <p><a href='javascript: refreshCaptcha();' style="color:#F00;">Refresh</a></p>  
              
              <script type='text/javascript'>
                  function refreshCaptcha()
                  {
                      var img = document.images['captchaimg'];
                      img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                  }
              </script>
						</div>


          <div class="col-md-6 col-12 form-group">
								<div class="form-group-inner">
									<input type="captcha" class="form-control" name="code_captcha" placeholder="Fill in the captcha" aria-required="true" required>
								</div>
							</div><!--//email-group-->


              
            <div class="form_btn form-group">
     					<button type="submit" class="btn btn-block btn-theme-primary btn-cta float-end">Submit</button>
            </div>
              <div class="col-md-6 col-12 form-group">
                   <ul>
                   <li><small><a href="/register">Register here</a></small></li>
                   <li><small><a href="/reset_password">Reset Password</a></small></li>
                   <li><small><a href="/resend_verify">Reset Verification</a></small></li>
                   </ul>    
              </div>
      </div>
					</form><!--//contact-form-->         
</div>
<div class="col-md-4">
</div>
        