<?php

if($postit == "contactus") {

die('test');

$error = 0;

if(isset($_SESSION['captcha_code'])){

    if($_SESSION['captcha_code'] != $_POST['code_captcha']){
      $_SESSION['message']="Oops, captcha error";
      unset($_SESSION["captcha_code"]);
      $error = 1;
    }
} else {
  $_SESSION['message']="Oops, captcha error";
  unset($_SESSION["captcha_code"]);
  $error = 1;
  header ("location: /home");
}

  if ($_POST['name'] == ""){ $err .="Name is empty - "; $error = 1; }
  if ($_POST['email'] == ""){ $err .="Email is empty - "; $error = 1; }
  if ($_POST['subject'] == ""){ $err .="Subject is empty - "; $error = 1; }
  if ($_POST['message'] == ""){ $err .="Message is empty - "; $error = 1; }
  
  $_SESSION['message'] = $err;
  
  if($error == 0) {
  
  include('app/engine/php-email-form.php');

  $contact = new PHP_Email_Form;
  //$contact->ajax = true;
  
  $sendername = $_POST['name'];
  $senderemail = $_POST['email'];
  $subject= $_POST['subject'];
  $message = $_POST['message'];
  
  $contact->to = ADMINEMAIL;
  $contact->from_name = $sendername;
  $contact->from_email = $senderemail;
  $contact->subject = $subject;

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
   /*
      echo DOMAIN;
      echo '----';
      echo ADMINEMAIL;
      echo '----';
      echo  EMAILPASS;
      echo $sendername;
      echo '----';
      echo $senderemail;
      echo '----';
      echo $message;
      echo '----';
  */

  $contact->smtp = array(
    'host' => DOMAIN,
    'username' => ADMINEMAIL,
    'password' => EMAILPASS,
    'port' => '587'
  );

  
  $contact->add_message( $sendername, 'From');
  $contact->add_message( $senderemail, 'Email');
  $contact->add_message( $message, 'Message', 10);

  $send =$contact->send();

  if($send == true) {
  

  $emaildata = [
    'sendername' => $sendername,
    'senderemail' => $senderemail,
    'subject' => $subject,
    'message' => $message,
    'created' => date("Y-m-d"),
    'updated' => date("Y-m-d"),
    
  ];
              
  $sql = "INSERT INTO contactemails (sendername, senderemail, subject, message, created, updated) VALUES (:sendername, :senderemail, :subject, :message, :created, :updated)";
  $db->prepare($sql)->execute($emaildata); 
              
        
    $_SESSION['message']="The contact email has been send. Thank you.";
   // header ("location: /home");
   // exit();
  } else {
    $_SESSION['message']="There was a problem the email was not send.";
  }
  
  } 
  }

?>
