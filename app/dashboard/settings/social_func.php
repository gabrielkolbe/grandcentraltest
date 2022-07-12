 <?php

$title = '';
$contentdesc = '';
$keywords = ''; 


if($postit == "socialmediaupdate") {

    $poststring = $_POST;

    foreach($poststring as $postkey => $postvalue) {
      if( ($postkey <> 'postit') && ($postkey <> 'csrf_token') ) {

        $update = [
          'link' => $postvalue,
          'name' => $postkey,          
        ];
      
        $sql = "UPDATE socialmedia SET link=:link WHERE name=:name";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
        
      }
    }
    
          
        $_SESSION['message']="The social settings has been updated";
        header ("location: /dashboard/social_settings");
        exit();
    
    
     }


    $findimg = $db->prepare("SELECT * FROM socialmedia");
    $findimg->execute();
    $socials = $findimg->fetchAll();

    
?>