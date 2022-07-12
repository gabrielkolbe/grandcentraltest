<?php



if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
 $ip = $_SERVER['HTTP_CLIENT_IP'];
} 
else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else {
 $ip = $_SERVER['REMOTE_ADDR'];
}



//$count = $find->rowCount();

$today = date("Y-m-d");
$old_url= '';
$pageurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://").$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$find = $db->prepare("Select * FROM analytics WHERE ip_address='$ip' AND entry_time LIKE '%$today%'");
$find->execute();
$check = $find->fetch();

if(isset($check['id'])) {

  $old_url = $check['page_url'];
  $ip = $check['ip_address'];
  $country = $check['country'];
  $operating_system = $check['operating_system'];
  $browser = $check['browser'];
  $browser_version = $check['browser_version'];
  

} else { 


    //country name
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    $country = json_decode($result)->geoplugin_countryName;
    
    //browser
    $client = $_SERVER['HTTP_USER_AGENT'];
    $operatingsystem = explode(";",$client)[1];
    $tmp = explode(' ', $client);
    $browser = end($tmp);
    $browsername = explode("/",$browser)[0];
    $browserversion = explode("/",$browser)[1]; 
        
    if($old_url <>$pageurl) {
    
        $timenow = date("Y-m-d H:i:s");
     
        $imgdata = [
          'page_url' => $pageurl,
          'entry_time' => $timenow,
          'ip_address' => $ip,
          'country' => $country,
          'operating_system' => $operatingsystem,
          'browser' => $browsername,
          'browser_version' => $browserversion
          
        ];
        
        $sql = "INSERT INTO analytics (page_url,entry_time,ip_address,country,operating_system,browser,browser_version) VALUES (:page_url, :entry_time, :ip_address, :country, :operating_system, :browser, :browser_version)";
        $db->prepare($sql)->execute($imgdata); 
    
    }
              
}

?>