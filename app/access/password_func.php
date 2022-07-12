<?php

//################################################################################## 

if($postit == "reset_password") {

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
    $password_verify_code = $_GET["page"];

    $checkemail = $db->prepare("SELECT * FROM users WHERE email = '".$email."' AND password_verify_code = '".$password_verify_code."' LIMIT 1");
    $checkemail->execute();
    $email_exist = $checkemail->fetch();
    
    if (!$email_exist['id']) { 
        $_SESSION['error'] = "Sorry, something went wrong";
        header ("location: /resend_verify");
        exit();	
    
    } else {
    
        $password_new = secure_string($_POST['password']);
        $password = password_hash($password_new, PASSWORD_BCRYPT);
        
          $update = [
              'password' => $password,
              'password_verify_code' => '',
              'id' => $email_exist['id']
          ];    
          
          $sql = "UPDATE users SET password=:password, password_verify_code=:password_verify_code WHERE id=:id";
          $stmt= $db->prepare($sql);
          if($stmt->execute($update)) {
            $_SESSION['message'] = "Your password has been changed to '".$password_new."' !";
            header ("location: /login");
            exit();	
          } else {
           $_SESSION['error'] = "There was an error..";
          }
      }
    } 
}


?>