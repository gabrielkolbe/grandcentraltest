<?php

$firstname= '';
$lastname= '';
$email= '';


//################################################################################## 

if($postit == "register") {

    $err = '';

    if(isset($_SESSION['captcha_code'])){
    if($_SESSION['captcha_code'] == $_POST['code_captcha']){} else {
      $err="Oops, captcha error";
    }
    } else {
      $err="Oops, captcha error";
    }
    
    if(!(isset($_POST['firstname'])) ) { $err .="First Name is empty - "; }
    if(!(isset($_POST['lastname'])) ) { $err .="Last Name is empty - "; }
    if(!(isset($_POST['password'])) ) { $err .="Password is empty - "; }
    if(!(isset($_POST['email'])) ) { $err .="Email Address is empty - "; }
    
    
    if($err != '') {
       $_SESSION['error'] = $err;
    } else { 
    
    //var_dump($_POST);
    //die;


    $firstname= ucwords(strtolower($_POST['firstname']));
    $lastname= ucwords(strtolower($_POST['lastname']));
    $email= $_POST['email'];
    $password = secure_string($_POST['password']);
    $template = '';
    $template = $_POST['template'];


    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {} else {
      $_SESSION['error'] = "Sorry, does not look like an email address - ";
    }
        
    $checkemail = $db->prepare("SELECT * FROM users WHERE email = '".$email."' LIMIT 1");
    $checkemail->execute();
    $email_exist = $checkemail->fetch();
    
    if ($email_exist) { 
        $_SESSION['error'] = "Sorry, this email address already exist, have you registered before? ";
    
    } 
	
          $password = password_hash($password, PASSWORD_BCRYPT);

          $email_verify_code = '';
          $keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
      		$length = 8;
      		$randkey = "";
      		for ($i=0;$i<$length;$i++)  $email_verify_code .= substr($keychars, rand(1, strlen($keychars) ), 1);
          
          $username = $lastname.'_'.time();  	

          $data = [
              'password' => $password,
              'firstname' => $firstname,
              'lastname' => $lastname,
              'username' => $username,
              'email' => $email,
              'email_verify_code' => $email_verify_code,
              'role' => 'user',
              'template_id' => $template,
              'created' => date('Y-m-d H:i:s'),
              'updated' => date('Y-m-d H:i:s'),
          ];
          
         
          $sql = "INSERT INTO users (password, firstname, lastname, username, email, email_verify_code, role, template_id, created, updated) VALUES (:password, :firstname, :lastname, :username, :email, :email_verify_code,  :role, :template_id, :created, :updated)";
          $db->prepare($sql)->execute($data);
          
          $user_id = $db->lastInsertId();

          $encoded_id = $encrypt->encode($user_id);
          
          $updatedata = [
              'encoded_id' => $encoded_id,
              'id' => $user_id,
          ];
          $sql = "UPDATE users SET encoded_id=:encoded_id WHERE id=:id";
          $stmt= $db->prepare($sql);
          $stmt->execute($updatedata);

         
  	
           include('app/engine/php-email-form.php');
          
            $contact = new PHP_Email_Form;
            
     /*       
            echo $email;
            echo '----';
            echo NAME;
            echo '----';
            echo ADMINEMAIL;
             echo '----';
            echo $_SERVER['SERVER_NAME'];
             echo '----';
             echo DOMAIN;
             echo '----';
            echo  EMAILPASS;
        */   
            
            $contact->to = $email;
            $contact->from_name = NAME;
            $contact->from_email = ADMINEMAIL;
            $contact->subject = $_SERVER['SERVER_NAME'].' - Thank you for your registration';
          
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
            
            

    			header ("location: /login");
          exit();	

}
}


?>