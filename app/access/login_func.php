<?php

if($postit == "signintosite") {


    $err='';

    if(isset($_SESSION['captcha_code'])){
    if($_SESSION['captcha_code'] == $_POST['code_captcha']){} else {
      $err="Oops, captcha error";
    }
    } else {
      $err="Oops, captcha error";
    }
    
    if ($_POST['password'] == ""){ $err="Password is empty - "; }        
    
    if($err != '') {
       $_SESSION['error'] = $err;
    } else { 

  $email = $_POST["email"];
  $password = secure_string($_POST["password"]);
  $redirect = '/home';
  if(isset($_POST["redirect"])) { $redirect = $_POST["redirect"];  }
  

  $login = $db->prepare("SELECT * FROM users WHERE email = '".$email."' LIMIT 1");
  $login->execute();
  $userdetail = $login->fetch();

	if ($userdetail) {

     $checkpassword = password_verify($password , $userdetail['password']);

     if ($checkpassword) {

			if ( !empty($userdetail['email_verified_at'])) {
		
				$_SESSION['user_id'] = $userdetail['encoded_id'];
			//	setcookie("email", $userdetail['email'], time()+60*60*24*30);
				$_SESSION['firstname'] = $userdetail['firstname'];
        $_SESSION['role'] = $userdetail['role'];
        $_SESSION['site'] = $_SERVER['SERVER_NAME'];
                
        $_SESSION['message']="You are now signed in !";
        
        if ($userdetail['role'] == 'admin') {
            $_SESSION['message'] = "Sign in was successful.";
				    header ("location: /dashboard");
            exit();
        } else {
            $_SESSION['message'] = "Sign in was successful.";
				    header ("location: /home");
            exit();
        }         
			} else {			
				$_SESSION['message'] = "Please click on your email link and validate your account first";
        header ("location: /".$redirect);
        exit();	
			}
     } else {
       $_SESSION['error'] = "Invalid Username / Password combination.";
      header ("location: /login");
        exit();	
     }

	} else {   
		$_SESSION['error'] = "Invalid Username / Password combination.";
    header ("location: /login");
    exit();	
	}
  }
} 


?>
