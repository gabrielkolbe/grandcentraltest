
 
			<footer class="footer">
				<div class="footer-main container">
					<div class="row">
						<div class="footer-col business-hours-col col-lg-4 col-md-6 col-12">
							<h3 class="col-title">Business Hours</h3>
							<div class="intro">We are available on the following days and hours.</div>
							<ul class="business-hours-list list-unstyled">
								<li><strong><?php echo AVAILABILITY; ?></strong></li>
							</ul>
						</div><!--//footer-col-->
						<div class="footer-col contact-us-col col-lg-4 col-md-6 col-12">
							<h3 class="col-title">Contact Us</h3>
							<ul class="footer-contact-list list-unstyled">
								<li class="item">
									<span class="custom-icon icon-telephone_signal"></span>
									<span class="info"><?php echo TELEPHONE; ?></span>
								</li>
								<li class="item">
									<span class="custom-icon icon-email"></span>
									<span class="info">
                         <script type="text/javascript">
                         var strUser = '<?php echo ADMINEMAIL; ?>';
                				document.write('<A href="mailto:' + strUser + '">' + strUser + '</a>')
                			  </script>
                  </span>
								</li>    
								<li class="item">
									<span class="custom-icon icon-map_pin"></span>
									<span class="info">
                      <?php echo ADDRESS; ?>
									</span>
								</li>    
							</ul>
						</div><!--//footer-col-->
						<div class="footer-col follow-us-col col-lg-4 col-12">
							<h3 class="col-title">Follow Us</h3>
							<div class="intro">Follow us on the following social media platforms.</div>
							<div class="social-container">
								<ul class="list-inline social-list">
               <?php foreach(SOCIAL as $soc) { ?>
      						<li class="list-inline-item social-item"><a href="<?php echo $soc['link']; ?>"><i class="<?php echo $soc['icon']; ?>"></i></a></li>
                <?php } ?>
								</ul><!--//social-list-->
							</div><!--//social-container-->
							 
							<ul class="footer-menu list-unstyled">
								<li><a onclick="return sendajax('tradesman/modals/terms.php');">Terms &amp; Conditions</a></li>
								<li><a onclick="return sendajax('tradesman/modals/privacy.php');">Privacy Policy</a></li> 
							</ul>
						</div><!--//footer-col-->
					</div><!--//row-->
					
					
					
				</div><!--//container-->
				<div class="bottombar text-center">
					
<script type="text/javascript">
//  $(function(){
//    $('#winningducklink').trigger('click');
//})
</script>
					<div class="copyright">
        
<p>&copy; <?php echo date('Y'); ?> Copyright, All Right Reserved -  <a id="winningducklink" onclick="return sendajax('/app/modals/ad.php');">Winningduck</a> </p></div>  

				</div><!--//bottombar--> 
			</footer><!--//footer-->


			
			

			
			<!-- Main Javascript -->          
			<script src="/tradesman/js/popper.min.js"></script> 
			<script src="/tradesman/js/bootstrap.min.js"></script>
			<script src="/tradesman/js/tiny-slider.js"></script> 
			<script src="/tradesman/js/vanilla-back-to-top.min.js"></script> 
			<script src="/tradesman/js/smoothscroll.min.js"></script>
			<script src="/tradesman/js/simple-lightbox.min.js"></script> 
			<script src="/tradesman/js/gumshoe.polyfills.min.js"></script> 
			
			<script src="/tradesman/js/main.js"></script> 

     <?php include('app/partials/modal.php');  ?>
			
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery div a', {});
    })();
</script>

		</body>
		</html> 