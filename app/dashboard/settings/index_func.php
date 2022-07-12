 <?php

$title = '';
$contentdesc = '';
$keywords = ''; 
 
if($postit == "sitesettings") {

    $err = '';
  	if ($_POST['title'] == ""){ $err .="Title is empty - "; }

    
    if($err != '') {
       $_SESSION['message'] = $err;
    } else {
        
        $title = ucwords(strtolower(sanitzehtml($_POST['title'])));
        $contentdesc = $_POST['contentdesc']);
        $keywords = $_POST['keywords']);
                
        $update = [
          'title' => $title,
          'contentdesc' => $contentdesc,
          'keywords' => $keywords,
          'id' => 1,          
        ];
      
        $sql = "UPDATE settings SET title=:title, contentdesc=:contentdesc, keywords=:keywords  WHERE id=:id";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
          
        $_SESSION['message']="The settings has been updated";
        header ("location: /dashboard/settings");
        exit();
    
    
     }
  
  }

    $findimg = $db->prepare("SELECT * FROM settings");
    $findimg->execute();
    $result = $findimg->fetch();

    
?>