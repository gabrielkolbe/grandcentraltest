<?PHP $somecontent = '<?xml version="1.0" encoding="iso-8859-1"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>Propheticvoice.co.uk</title>
<link>http://Propheticvoice.co.uk</link>
<description>Christian articles</description>
<language>en</language>';
$query = "
SELECT *
FROM  tbl_Articles 
JOIN tbl_categories ON  tbl_categories.id = tbl_Articles.post_category_id
WHERE tbl_Articles.post_status = 1
Order by tbl_Articles.id DESC";
	$result = mysql_query($query);
		while ($row = mysql_fetch_object($result)) {
$somecontent .= '
  
  <item>
    <title>'.$row->post_title.'</title>
    <link>http://www.'.$website.'/'.$row->slug.'/'.$row->ref.'</link>
    <description>'.$postshort.'</description>
    <pubDate>'.gmdate("D, d M Y H:i:s T", $row->post_date).'</pubDate>
    <guid>http://www.'.$website.'/'.$row->slug.'/'.$row->ref.'</guid>
  </item>';}
$somecontent .= '<atom:link href="http://www.'.$website.'/rss.xml" rel="self" type="application/rss+xml" />
</channel>
</rss>';	