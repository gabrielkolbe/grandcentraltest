<?php



function limit_text($text, $limit) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos   = array_keys($words);
      $text  = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}

function generate_token() {
  // Check if a token is present for the current session
  if(!isset($_SESSION["csrf_token"])) {
       $token = random_bytes(64);
        $token = bin2hex($token); 
          
          
      $_SESSION["csrf_token"] = $token;
  } else {
      // Reuse the token
      $token = $_SESSION["csrf_token"];
  }
  return $token;
}

function secure_string($var){

  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

 // $remove = array('&quot;', '/', '(',  ')', '.', ',', ';', ':', '&', '?', '?', '?',' ', '*', '', '"', '$', '%', '}', '{', '@', '+', '^');
 // $var = str_replace($remove, " ", $var);
  $var = htmlentities(trim($var), ENT_QUOTES);
  $var  = $mysqli->real_escape_string($var);
  return $var;

}
  
function sanitzehtml($html){

  $html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
  $html_a = htmlentities( preg_replace( $html_reg, '', $html ) );

  return $html_a;
  
}

function sanitzejavascript($html){

  $html_a = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $html);

  return $html_a;
  
}

function mysqlescapestring($html){

  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  $html_b = $mysqli -> real_escape_string($html);

  return $html_b;
  
}

function slugmaker($z){
    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = str_replace(' ', '_', $z);
    return trim($z, '_');
}

function RandomString($len)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $len; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}

/*

function stringreplace($var){

  $remove = array('&quot;', '/', '(',  ')', '.', ',', ';', ':', '&', '?', '�', '�',' ', '*', '!', '', '_', '"', '$', '%', '}', '{', '@', '+', '^', '___');
  $var = str_replace($remove, " ", $var);
  
  return $var;

}

function cleanurl($var){

  $remove = array('&quot;', '/', '(',  ')', '.', ',', ';', ':', '&', '?', '�', '�',' ', '*', '!', '', '_', '"', '$', '%', '}', '{', '@', '+', '^', '___');
  
  $var = trim($var);
  $var = str_replace($remove, "-", $var);
  $var = strtolower($var);
  $var = str_replace("'", "-", $var);
  $var = str_replace("___", "-", $var);
  $var = str_replace("---", "-", $var);
  $var = str_replace("--", "-", $var);
  
  
  return $var;

}

function clean_inputs() { 
foreach ($_POST as $key => $value) { $_POST[$key] = htmentities(trim($value), ENT_QUOTES); } 	
}



function replacequotes($var){

  $var = str_replace("'", "&#39;", $var);
  return $var;

}

function percent($amount, $percentage) {
$count1 = $amount / 100;
$count2 = $count1 * $percentage;
return $count2;
}


function cleannumber($var) {
  $remove = array(',', '.');
  $var = str_replace($remove, "", $var);
  return $var;
}

	function currencyconverter($from_Currency,$to_Currency,$amount) {
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[1]);  
    $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
    return $converted_amount;
}

function cutDesc($string)
{
$string = substr($string, 0, 200);
$find =  array("<BR>", "<br>", "</ BR>", "</ br>", "<p>", "</p>");
$replace =  array("", "", "", "", "", "");
$string = str_replace($find, '', $string);
$string = trim ($string);
return $string;
}

/* extra classes */

function cleanNum($str) {
	$pattern = array(' ', ',', '.', '_', '-', ';', ':', '  ');
	$str = trim($str);
	$str = str_replace ($pattern, '', $str);
	$str = number_format($str);
	
	return $str;
}
?>