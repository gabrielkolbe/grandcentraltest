<?PHP

class email {

var $to;
var $from;
var $subject;
var $body;



function sendMail( $to, $from, $subject, $body ) {

$headers = 'From: '.$from.'' . "\r\n".
'Reply-To: '.$from.''. "\r\n".
'Return-Path: '.$from.'' . "\r\n".
'X-Mailer: PHP/' . phpversion();

	if (mail ($to, $subject, $body, $headers, '-f $from')){return true;} else { 
	return false;
	}
}
}
/*
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers = "From: ".$from."\n";

*/
?>