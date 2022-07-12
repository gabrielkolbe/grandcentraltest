<?PHP $somecontent = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.90">';
$find = $db->prepare("SELECT * FROM pages");
$find->execute();
$results = $find->fetchAll();
		foreach($results as $result) {
$somecontent .= '
  <url>
    <loc>https://www.'.DOMAIN.'/'.$result['slug'].'</loc>
		<lastmod>'.date("Y-m-d H:i:s").'</lastmod>
		<priority>0.5</priority>
	</url>';}
$somecontent .= '</urlset>';	
?>