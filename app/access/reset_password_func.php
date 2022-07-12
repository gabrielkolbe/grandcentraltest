<?php


//################################################################################## 

if($postit == "request_password") {

    $err='';

    if(isset($_SESSION['captcha_code'])){
    if($_SESSION['captcha_code'] == $_POST['code_captcha']){} else {
      $err="Oops, captcha error";
    }
    } else {
      $err="Oops, captcha error";
    }
   
    
    if($err != '') {
       $_SESSION['error'] = $err;
    } else { 



    $email = $_POST["email"];

    $checkemail = $db->prepare("SELECT * FROM users WHERE email = '".$email."' LIMIT 1");
    $checkemail->execute();
    $email_exist = $checkemail->fetch();
    
    if (!$email_exist) { 
        $_SESSION['error'] = "Sorry, something went wrong.";
        header ("location: /reset_password");
        exit();	
    
    } else {
    
        $firstname = $email_exist['firstname'];
        
        $password_verify_code = '';
        $keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
    		$length = 8;
    		$randkey = "";
    		for ($i=0;$i<$length;$i++)  $password_verify_code .= substr($keychars, rand(1, strlen($keychars) ), 1);
        
          $update = [
              'password_verify_code' => $password_verify_code,
              'id' => $email_exist['id'],
          ];
          $sql = "UPDATE users SET password_verify_code=:password_verify_code WHERE id=:id";
          $stmt= $db->prepare($sql);
          if($stmt->execute($update)) {
    
           include('app/engine/php-email-form.php');
          
            $contact = new PHP_Email_Form;
            //$contact->ajax = true;
            
            $contact->to = $email;
            $contact->from_name = NAME;
            $contact->from_email = ADMINEMAIL;
            $contact->subject = NAME.' - Reset your password';
          
            // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
          
            $contact->smtp = array(
              'host' => DOMAIN,
              'username' => ADMINEMAIL,
              'password' => EMAILPASS,
              'port' => '587'
            );
          
            include('app/emailtemplates/password.php');
            
            $contact->add_message( NAME, 'From');
            $contact->add_message( ADMINEMAIL, 'Email');
            $contact->add_message( $message, 'Message', 10);
          
            $send =$contact->send();
          
            if($send == true) {
                $_SESSION['message']="Thank you for your request, please check your emails.";
                header ("location: /home");
                exit();	
            } else {
              $_SESSION['error']="There was a problem the email was not send.";
            }
            
          } else {
             $_SESSION['error']="There was a problem.";
          }
      }
   } 
}



?>