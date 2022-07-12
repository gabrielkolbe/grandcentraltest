<?php


//################################################################################## 

if($postit == "verify_email") {

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



$code = $_GET['action'];

    $email = $_POST["email"];

    $checkemail = $db->prepare("SELECT * FROM users WHERE email = '".$email."' AND email_verify_code = '".$code."' LIMIT 1");
    $checkemail->execute();
    $email_exist = $checkemail->fetch();
    
    if (!$email_exist) { 
        $_SESSION['error'] = "Sorry, something went wrong";
        header ("location: /verify/code/".$code);
        exit();	
    
    } else {
    
        $update = [
          'email_verify_code' => '',
          'email_verified_at' => date('Y-m-d H:i:s'),
          'id' => $email_exist['id'],                  
        ];
        
      
        $sql = "UPDATE users SET email_verify_code=:email_verify_code, email_verified_at=:email_verified_at WHERE id=:id";
        $stmt= $db->prepare($sql);
        if($stmt->execute($update)) {
            $_SESSION['message'] = "Congratulations! your account has been verified!";
            header ("location: /login");
            exit();	
        } else {
          $_SESSION['error'] = "Sorry, something went wrong";
        }
    }
    
    } 

}


?>