<?php
    $find = $db->prepare("SELECT pf.id, pf.heading, pf.content, i.name as image, i.alttags FROM section_features AS pf LEFT JOIN images AS i ON pf.image_id =  i.id WHERE pf.slug='about'");
    $find->execute();
    $aboutfeature = $find->fetch();
?>
<a class="anchor" id="about"></a> 
<section  class="about-section section text-center">
			<div class="container">
				<h2 class="section-title"><?php echo $aboutfeature['heading']; ?></h2>
				<div class="section-intro">
				<p><?php echo $aboutfeature['content']; ?></p>
          </div><!--//about-desc-->
				<figure class="about-figure">
          <img class="img-fluid center-block" src="<?php echo IMAGEPATH.$aboutfeature['image']; ?>" alt="<?php echo $aboutfeature['alttags']; ?>">
				</figure>
			</div><!--//container-->
		</section><!--//about-section-->