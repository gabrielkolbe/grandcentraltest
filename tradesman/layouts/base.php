<?php 
include (APP."/partials/preheader.php");

include (APP."/partials/header.php");
include ("app/includes/message.php"); 

$find = $db->prepare("SELECT s.type, ps.section_slug FROM page_sections AS ps LEFT JOIN sections AS s ON s.slug = ps.section_slug WHERE ps.page = '".PAGE."' ORDER BY ps.rank ASC");
$find->execute();
$pgsections = $find->fetchAll();

$find = $db->prepare("SELECT heading FROM page_features WHERE slug = '".PGSLUG."'");
$find->execute();
$pgfeature = $find->fetch();


if(isset($pgfeature['heading'])) { ?>
<div class="text-center" style="margin-top:20px; margin-bottom:20px"><H1><?php echo $pgfeature['heading']; ?></H1></div> 
<?php }

foreach($pgsections as $pgsection) {
  $section_slug = $pgsection['section_slug'];
  include (APP."/sections/".$pgsection['type'].".php"); 
}

include (APP."/partials/footer.php"); 
?>
