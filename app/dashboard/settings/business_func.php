 <?php


$businessname = ''; 
$businesstelephone = ''; 
$businessemail = '';
$businessaddress = ''; 
$availablehours = '';
$availabledays = ''; 


if($postit == "business_settings") {

    $err = '';
  	if ($_POST['businessname'] == ""){ $err .="Business name is empty - "; }
    if ($_POST['businessemail'] == ""){ $err .="Email is empty - "; }


    
    if($err != '') {
       $_SESSION['message'] = $err;
    } else {
        
        $businessname = ucwords(strtolower(sanitzehtml($_POST['businessname'])));
        $businesstelephone = $_POST['businesstelephone'];
        $businessemail = $_POST['businessemail'];
        $businessaddress = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['businessaddress']);
        $businessaddress = $businessaddress;
        $availablehours = $_POST['availablehours'];
        $availabledays = $_POST['availabledays'];
        $availability = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['availability']);
        $availability = $availability;
        $googlemap = $_POST['googlemap'];
        
        $update = [
          'businessname' => $businessname,
          'businesstelephone' => $businesstelephone,
          'businessemail' => $businessemail,
          'businessaddress' => $businessaddress,
          'availablehours' => $availablehours,
          'availabledays' => $availabledays,
          'availability' => $availability,
          'googlemap' => $googlemap,
          'id' => 1,          
        ];
      
        $sql = "UPDATE settings SET businessname=:businessname, businesstelephone=:businesstelephone, businessemail=:businessemail, businessaddress=:businessaddress, availablehours=:availablehours, availabledays=:availabledays, availability=:availability,  googlemap=:googlemap WHERE id=:id";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
          
        $_SESSION['message']="The business settings has been updated";
        header ("location: /dashboard/business_settings");
        exit();
    
     }
  }

    $findimg = $db->prepare("SELECT * FROM settings");
    $findimg->execute();
    $result = $findimg->fetch();

    
?>