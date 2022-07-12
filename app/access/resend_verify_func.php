<?php

//################################################################################## 

if($postit == "resend_verification") {

    $email = _POST["email"];

    $checkemail = $db->prepare("SELECT * FROM users WHERE email = '".$email."' LIMIT 1");
    $checkemail->execute();
    $email_exist = $checkemail->fetch();
    
    if (!$email_exist['email_verify_code']) { 
        $_SESSION['error'] = "Sorry, something went wrong";
        header ("location: /resend_verify");
        exit();	
    
    } else {
    
        $firstname = $email_exist['firstname'];
        $email_verify_code = $email_exist['email_verify_code'];
    
           include('app/engine/php-email-form.php');
          
            $contact = new PHP_Email_Form;
            //$contact->ajax = true;
            
            $contact->to = $email;
            $contact->from_name = NAME;
            $contact->from_email = ADMINEMAIL;
            $contact->subject = NAME.' - Here is the verification code you requested';
          
            // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
          
            $contact->smtp = array(
              'host' => DOMAIN,
              'username' => ADMINEMAIL,
              'password' => EMAILPASS,
              'port' => '587'
            );
          
            include('app/emailtemplates/registration.php');
            
            $contact->add_message( NAME, 'From');
            $contact->add_message( ADMINEMAIL, 'Email');
            $contact->add_message( $message, 'Message', 10);
          
            $send =$contact->send();
          
            if($send == true) {
                $_SESSION['message']="Thank you for your registration, please check your emails.";
            } else {
              $_SESSION['error']="There was a problem the email was not send.";
            }
    
    } 

}


?>