	<!-- ******HEADER****** -->  
  <style>
  .bi {
  color:white;  
}
</style>  
	<header id="header" class="header">  
		<div id="topbar" class="topbar  fixed-top">
			<div class="container-fluid">
				<nav class="main-nav navbar navbar-expand-md navbar-dark" role="navigation">
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div id="navbar-collapse" class="navbar-collapse collapse text-center">
						<ul class="nav navbar-nav">
<?php
 foreach(PAGEMENU as $page) { ?>
						<li class="nav-item"><a class="nav-link" href="/<?php echo $page['slug']; ?>"><?php echo $page['menu']; ?></a></li>
<?php } ?>
<?php
foreach(MENU as $section) {  ?>
						<li class="nav-item"><a class="nav-link" href="/home#<?php echo $section['slug']; ?>"><?php echo $section['menu']; ?></a></li>
<?php } ?>



            <?php if(LOCKSITE == 'yes') { ?>	<li class="nav-item"><a class="nav-link" href="/dashboard"><span style="color:red; background-color:#fff;">Edit this site (will be removed)</span></a></li> <?php } ?>
						</ul><!--//nav-->
					</div><!--//navabr-collapse-->
				</nav><!--//main-nav--> 
        <?php if(SHOWTOPSOCIAL == 'yes') { ?>
				<div class="social-container d-none d-lg-block">
					<ul class="list-inline social-list">
          <?php foreach(SOCIAL as $soc) { ?>
						<li class="list-inline-item social-item"><a href="<?php echo $soc['link']; ?>"><i class="<?php echo $soc['icon']; ?>"></i></a></li>
          <?php } ?>
					</ul><!--//social-list-->
				</div><!--//social-container-->
        <?php } ?> 
			</div><!--//container-->
		</div><!--//topbar-->
		<div class="branding container">    
			<h1 class="logo"><a href="/home"><img id="logo-image" class="logo-image" src="<?php echo IMAGEPATH.LOGO; ?>" alt="<?php echo DOMAIN; ?> logo" style="border-radius: <?php echo LOGORADIUS; ?>%; max-height: <?php echo LOGOHEIGHT; ?>px;"></a></h1> 
			<ul class="header-info-list list-inline float-end">
      <?php if(SHOWLOGOTELMAIL == 'yes') { ?>
				<li class="list-inline-item info-item contact-methods">
				<?php if(SHOWLOGOICONS == 'yes') { ?>	<span class="custom-icon icon-telephone_signal"></span>  <?php } ?> 
					<span class="info-main phone-number"><?php echo TELEPHONE; ?></span>
					<span class="info-sub"> 
          
         <script type="text/javascript">var strUser = '<?php echo ADMINEMAIL; ?>';
				document.write('<A href="mailto:' + strUser + '">' + strUser + '</a>')
			  </script>

				</li><!--//info-item-->
          <?php } ?> 
          <?php if(SHOWLOGOTIMEDAY == 'yes') { ?>
				<li class="list-inline-item info-item business-hours">
				<?php if(SHOWLOGOICONS == 'yes') { ?>		<span class="custom-icon icon-clock"></span>  <?php } ?> 
					<span class="info-main phone-number"><?php echo AVAILABLEHOURS; ?></span>
					<span class="info-sub"><?php echo AVAILABLEDAYS; ?></span>
				</li><!--//info-item-->
         <?php } ?> 
			</ul><!--//info-list-->
		</div><!--//branding-->
	</header><!--//header-->