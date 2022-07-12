<?php

define('SLUG', $_GET['slug']);
define('SLUR', $_GET['slur']);
  
  if($postit == "edit_main") {

    $err = '';
  	if ($_POST['name'] == ""){ $err .="Name is empty - "; }
  
        if($err != '') {
           $_SESSION['error'] = $err;
        } else {
                  
        $menu = '';
        $slug = $_POST['slug'];          
        $name = $_POST['name'];
        if(isset($_POST['menu'])) { $menu= ucwords(strtolower(sanitzehtml($_POST['menu'])));  }
            
        
        if(isset( $_POST['displaymenu']) ) { $displaymenu = 'yes'; } else { $displaymenu = 'no'; }
        
        $update = [
          'name' => $name,
          'menu' => $menu,
          'displaymenu' => $displaymenu,
          'slug' => $slug,          
        ];
      
        $sql = "UPDATE sections SET name=:name, menu=:menu, displaymenu=:displaymenu WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
        
        if(isset($_FILES['image'])) {
        if($_FILES['image']['name'] == '') {
         
            $image_id = $_POST['oldimg'];
            
        } else {
        
            $alttags = '';
            if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
            
            $imgsizew = $_POST['imgsizew']; //desired w
            $imgsizeh = $_POST['imgsizeh'];  //desired h
            $imgsizep = $_POST['imgsizep'];  // priority
            $thumbwidth = '160';
            if(isset($_POST['imagethumb'])) {
              $thumbwidth = $_POST['imagethumb'];  // priority
            }
          
            include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
        }
        } else { $image_id = ''; }    
        
        $heading = '';
        $heading2 = '';
        $strapline = '';
        $content = '';
        $link = '';

        if(isset($_POST['heading'])) { $heading = $_POST['heading']; }
        if(isset($_POST['heading2'])) { $heading2 = $_POST['heading2']; }

        if(isset($_POST['strapline'])) { 
            $strapline = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['strapline']);
            $strapline = $strapline;   
        } 
                
        if(isset($_POST['content'])) { 
            $content = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['content']);
            $content = $content;
        }
        
        if(isset($_POST['link'])) { $link = $_POST['link']; }

        $updatefeatures = [
          'heading' => $heading,
          'heading2' => $heading2,
          'strapline' => $strapline,
          'content' => $content,
          'link' => $link,
          'image_id' => $image_id,
          'slug' => $slug,          
        ];

      
        $sql = "UPDATE section_features SET heading=:heading, heading2=:heading2, strapline=:strapline, content=:content, link=:link, image_id=:image_id WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($updatefeatures);
        
          
      }

      $_SESSION['message']="The page has been updated";

     }
     
       //##################################################################################
     
       if($postit == "update_feature") {
       
       $slug = $_POST['slug'];
       
       $image_id = '';

        if(isset($_FILES['image'])) {
        
            $alttags = '';
            if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
            
            $imgsizew = $_POST['imgsizew']; //desired w
            $imgsizeh = $_POST['imgsizeh'];  //desired h
            $imgsizep = $_POST['imgsizep'];  // priority
            $thumbwidth = '160';
            if(isset($_POST['imagethumb'])) {
              $thumbwidth = $_POST['imagethumb'];  // priority
            }
          
            include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
 
        } else { if(isset($_POST['oldimg'])) { $image_id = $_POST['oldimg']; }  }    
        
        $heading = '';
        $heading2 = '';
        $strapline = '';
        $content = '';
        $link = '';

        if(isset($_POST['heading'])) { $heading = $_POST['heading']; }
        if(isset($_POST['heading2'])) { $heading2 = $_POST['heading2']; }

        if(isset($_POST['strapline'])) { 
            $strapline = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['strapline']);
            $strapline = $strapline;   
        } 
                
        if(isset($_POST['content'])) { 
            $content = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['content']);
            $content = $content;
        }
        
        if(isset($_POST['link'])) { $link = $_POST['link']; }
        
        $find = $db->prepare("SELECT * FROM section_features WHERE slug='".$slug."'");
        $find->execute();
        $found = $find->fetch();
        if($found) {

            $updatefeatures = [
              'heading' => $heading,
              'heading2' => $heading2,
              'strapline' => $strapline,
              'content' => $content,
              'link' => $link,
              'image_id' => $image_id,
              'slug' => $slug,          
            ];
    
          
            $sql = "UPDATE section_features SET heading=:heading, heading2=:heading2, strapline=:strapline, content=:content, link=:link, image_id=:image_id WHERE slug=:slug";
            $stmt= $db->prepare($sql);
            $stmt->execute($updatefeatures);

      } else {
      
              $insert = [
                  'slug' => $slug,    
                  'heading' => $heading,
                  'heading2' => $heading2,
                  'strapline' => $strapline,
                  'content' => $content,
                  'link' => $link,
                  'image_id' => $image_id   
              ];
                
              $sql = "INSERT INTO section_features (slug, heading, heading2, strapline, content, link, image_id) VALUES (:slug, :heading, :heading2, :strapline, :content, :link, :image_id )";
              $db->prepare($sql)->execute($insert); 
      
      }

      $_SESSION['message']="The section has been updated";

     }
     
       //##################################################################################

    if($postit == "add_main_image") {
    
      $slug = $_POST['slug'];
      
     if(isset($_FILES['image'])) {
        if($_FILES['image']['name'] == '') {
         
            $image_id = '';
            
        } else {
        
            $alttags = '';
            if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
            
            $imgsizew = $_POST['imgsizew']; //desired w
            $imgsizeh = $_POST['imgsizeh'];  //desired h
            $imgsizep = $_POST['imgsizep'];  // priority
            $thumbwidth = '160';
            if(isset($_POST['imagethumb'])) {
              $thumbwidth = $_POST['imagethumb'];  // priority
            }
            
          
            include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
        }     
      } else { $image_id = $_POST['oldiimg']; }    
                
          $update = [
          'image_id' => $image_id,
          'slug' => $slug,                    
          ];
          
          $sql = "UPDATE section_features SET image_id = :image_id WHERE slug=:slug";
          $stmt= $db->prepare($sql);
          if($stmt->execute($update)) {
              $_SESSION['message']="The image has been uploaded"; 
          }     
     }


     //##################################################################################

    if($postit == "delete_main_image") {
    
      $slug = $_POST['slug'];
          
      $find = $db->prepare("SELECT * FROM section_features WHERE slug='".$slug."'");
      $find->execute();
      $section = $find->fetch();
      
      $image_id = $section['image_id'];
  
      if($section['image_id'] != '') {
      
        $update = [
          'image_id' => NULL,
          'slug' => $slug,                              
        ];
        
        $sql = "UPDATE section_features SET image_id=:image_id WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        if ($stmt->execute($update)) {
          $_SESSION['message']="The section images has been deleted";
        }
      }
      
    $thisorall = 'no';  
    if(isset($_POST['thisorall'])) { $thisorall = $_POST['thisorall']; }  
    
     if($thisorall == 'all') {
     
        $findone = $db->prepare("SELECT * FROM images WHERE id='".$image_id."'");
        $findone->execute();
        $result = $findone->fetch();
        
        if($result) {
        
            $image_name = $result['name'];
            $thumb = $result['thumb'];
         
            $sql = 'DELETE FROM images WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $image_id, PDO::PARAM_INT);
          
            // execute the statement
              if ($statement->execute()) {
              
                  if(file_exists(UPLOADIMG.$image_name)){
                    unlink(UPLOADIMG.$image_name);
                  }
                  if(file_exists(UPLOADIMG.$thumb)){
                    unlink(UPLOADIMG.$thumb);
                  }
              }
          }
     }
      

    }


//##################################################################################

    if($postit == "add_part") {

    $err = '';
     
     if(isset($_FILES['image'])) {
        if($_FILES['image']['name'] == '') {
         
            $image_id = '';
            
        } else {
        
            $alttags = '';
            $imgsizem= '';
            if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
            if(isset($_POST['imgsizem'])) { $imgsizem = $_POST['imgsizem']; }

            $imgsizew = $_POST['imgsizew']; //desired w
            $imgsizeh = $_POST['imgsizeh'];  //desired h
            $imgsizep = $_POST['imgsizep'];  // priority

            
            $thumbwidth = '160';
            if(isset($_POST['imagethumb'])) {
              $thumbwidth = $_POST['imagethumb'];  // priority
            }
            
          
            include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
        }     
      } else { $image_id = ''; }         
      // modal form post

  
              $name = '';
              if(isset($_POST['name'])) { $name = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['name']); }
              $strapline = '';
              if(isset($_POST['strapline'])) { $strapline = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['strapline']); }
              $content = '';
              if(isset($_POST['content'])) { $content = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['content']); }
              $link = '';
              if(isset($_POST['link'])) { $link = $_POST['link']; }
              $slug = $_POST['slug'];

              
              $insert = [
                'slug' => $slug,
                'name' => $name,
                'strapline' => $strapline,
                'content' => $content,
                'image_id' => $image_id,
                'link' => $link,          
              ];
                
              $sql = "INSERT INTO section_parts (slug, name, strapline, content, image_id, link) VALUES (:slug, :name, :strapline, :content, :image_id, :link)";
              $db->prepare($sql)->execute($insert); 
              
              $_SESSION['message']="The new section has been inserted"; 

     }
     
//##################################################################################

  if($postit == "edit_part") {


        $name = '';
        $strapline = '';
        $link = '';
        $content = '';
        
        if(isset($_POST['name'])) { $name = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['name']); }
        if(isset($_POST['strapline'])) { $strapline = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['strapline']); }
        if(isset($_POST['content'])) { $content = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST['content']); }
        if(isset($_POST['link'])) { $link = $_POST['link']; }
        
        $slug = $_POST['slug'];
        $id = $encrypt->decode($_POST['id']);
        
        $update = [
          'name' => $name,
          'strapline' => $strapline,
          'content' => $content,
          'link' => $link,
          'slug' => $slug,                       
          'id' => $id,          
        ];
        

        
        $sql = "UPDATE section_parts SET name=:name ,strapline=:strapline, content=:content, link=:link WHERE slug=:slug AND id=:id";
        $stmt= $db->prepare($sql);

        
        $stmt->execute($update);

        $_SESSION['message']="The section part has been updated";
      
       
  }
  
//##################################################################################

  if($postit == "delete_part") {
  
      $id = $encrypt->decode($_POST['id']);
      $slug = $_POST['slug'];
      

      $find = $db->prepare("SELECT * FROM section_parts WHERE id='".$id."' AND slug='".$slug."'");
      $find->execute();
      $part = $find->fetch();
      
      if($part['id'] == $id) {

              $sql2 = "DELETE FROM section_parts WHERE id='".$id."' AND slug='".$slug."'";
              $statement2 = $db->prepare($sql2);
              if ($statement2->execute()) {
                $_SESSION['message']="The part section has been deleted";
              }

      } 
  }

  //##################################################################################

    if($postit == "add_image") {
    
      $id = $encrypt->decode($_POST['id']);
      $slug = $_POST['slug'];
      
     if(isset($_FILES['image'])) {
        if($_FILES['image']['name'] == '') {
         
            $image_id = '';
            
        } else {
        
            $alttags = '';
            if(isset($_POST['alttags'])) { $alttags = $_POST['alttags']; }
            
            $imgsizew = $_POST['imgsizew']; //desired w
            $imgsizeh = $_POST['imgsizeh'];  //desired h
            $imgsizep = $_POST['imgsizep'];  // priority
            $thumbwidth = '160';
            if(isset($_POST['imagethumb'])) {
              $thumbwidth = $_POST['imagethumb'];  // priority
            }
            
          
            include ($_SERVER["DOCUMENT_ROOT"]."/app/dashboard/images/add_func_incl.php");  
        }     
      } else { $image_id = $_POST['oldiimg']; }    
                
          $update = [
          'image_id' => $image_id,
          'slug' => $slug,                       
          'id' => $id,           
          ];
          
          $sql = "UPDATE section_parts SET image_id = :image_id WHERE slug=:slug AND id=:id";
          $stmt= $db->prepare($sql);
          if($stmt->execute($update)) {
              $_SESSION['message']="The image has been uploaded"; 
          }     
     }
     
          //##################################################################################

    if($postit == "delete_part_and_image") {
    

      $id = $encrypt->decode($_POST['id']);
      $slug = $_POST['slug'];

      $find = $db->prepare("SELECT * FROM section_parts WHERE id='".$id."' AND slug='".$slug."'");
      $find->execute();
      $part = $find->fetch();
      $image_id = $part['image_id']; 
      
      if($part['id'] == $id) {

              $sql2 = "DELETE FROM section_parts WHERE id='".$id."' AND slug='".$slug."'";
              $statement2 = $db->prepare($sql2);
              if ($statement2->execute()) {
                $_SESSION['message']="The part section has been deleted";
              }

      }
      
      
    $thisorall = 'no';  
    if(isset($_POST['thisorall'])) { $thisorall = $_POST['thisorall']; }  
    
     if($thisorall == 'all') {
     
        $findone = $db->prepare("SELECT * FROM images WHERE id='".$image_id."'");
        $findone->execute();
        $result = $findone->fetch();
        
        if($result) {
        
            $image_name = $result['name'];
            $thumb = $result['thumb'];
         
            $sql = 'DELETE FROM images WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $image_id, PDO::PARAM_INT);
          
            // execute the statement
              if ($statement->execute()) {
              
                  if(file_exists(UPLOADIMG.$image_name)){
                    unlink(UPLOADIMG.$image_name);
                  }
                  if(file_exists(UPLOADIMG.$thumb)){
                    unlink(UPLOADIMG.$thumb);
                  }
              }
          }
     }
     
    }


     //##################################################################################

    if($postit == "delete_image") {
    

      $id = $encrypt->decode($_POST['id']);
      $slug = $_POST['slug'];
          
      $find = $db->prepare("SELECT * FROM section_parts WHERE id='".$id."' AND slug='".$slug."'");
      $find->execute();
      $part = $find->fetch();
      
      $image_id = $part['image_id'];
      
      if($part['id'] == $id) {
  
      if($part['image_id'] != '') {
      
        $update = [
          'image_id' => NULL,
          'slug' => $slug,                       
          'id' => $id,            
        ];
        
        $sql = "UPDATE section_parts SET image_id=:image_id WHERE slug=:slug AND id=:id";
        $stmt= $db->prepare($sql);
        if ($stmt->execute($update)) {
          $_SESSION['message']="The section images has been deleted";
        }
      } 
      }
      
    $thisorall = 'no';  
    if(isset($_POST['thisorall'])) { $thisorall = $_POST['thisorall']; }  
    
     if($thisorall == 'all') {
     
        $findone = $db->prepare("SELECT * FROM images WHERE id='".$image_id."'");
        $findone->execute();
        $result = $findone->fetch();
        
        if($result) {
        
            $image_name = $result['name'];
            $thumb = $result['thumb'];
         
            $sql = 'DELETE FROM images WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $image_id, PDO::PARAM_INT);
          
            // execute the statement
              if ($statement->execute()) {
              
                  if(file_exists(UPLOADIMG.$image_name)){
                    unlink(UPLOADIMG.$image_name);
                  }
                  if(file_exists(UPLOADIMG.$thumb)){
                    unlink(UPLOADIMG.$thumb);
                  }
              }
          }
     }
     
    }


    
//##################################################################################

      include ("app/dashboard/design/modalcolour.php"); 
      
      
     //three

    $find = $db->prepare("SELECT * FROM sections WHERE slug = '".SLUG."'");
    $find->execute();
    $section = $find->fetch();
    
    
    $find = $db->prepare("SELECT s.heading, s.heading2, s.strapline, s.content, s.link, i.name as image, i.id as image_id, i.thumb, i.alttags, i.width FROM section_features AS s LEFT JOIN images AS i ON s.image_id =  i.id WHERE slug =  '".SLUG."'");
    $find->execute();
    $feature= $find->fetch();
    
    $find = $db->prepare("SELECT s.id, s.name, s.strapline, s.content, s.link, i.thumb as image,i.thumb, i.alttags, i.width FROM section_parts AS s LEFT JOIN images AS i ON s.image_id =  i.id WHERE slug='".SLUG."'");
    $find->execute();
    $parts= $find->fetchAll();
    
  
    
    $find = $db->prepare("SELECT * FROM colours");
    $find->execute();
    $colours = $find->fetchAll();
    
    
    foreach($colours as $key => $val) {
    ${$val['name']} = $val['colour'];
    }
    
?>