 <?php

if($postit == "reorder_pages") {

    $ranks = $_POST['rank'];
    foreach($ranks as $key => $value) {
    
        $update = [
          'rank' => $key,
          'slug' => $value    
        ];
        
        $sql = "UPDATE sections SET rank=:rank WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
    }
  
    $_SESSION['message']="The sections has been reordered";
   }


   //##################################################################################
   
   
  if($postit == "addasection") {

    $err = '';
  	if ($_POST['name'] == ""){ $err .="Name is empty - "; }
    if ($_POST['section'] == ""){ $err .="Please choose a section - "; }
  
        if($err != '') {
           $_SESSION['error'] = $err;
        } else {
                     
        $name = $_POST['name'];
        $section = $_POST['section'];
        $slug = slugmaker($name);
        
        $data = [
        'name' => $name,
        'slug' => $slug,
        'type' => $section,
        'menu' => $name,
        'source' => 'new',
        'showit' => '1'
        ];
        
        $sql = "INSERT INTO sections (name, slug, type, menu, source, showit) VALUES (:name, :slug, :type, :menu, :source, :showit)";
        $db->prepare($sql)->execute($data);
        
        $data = [
        'slug' => $slug
        ];
        
        $sql = "INSERT INTO section_features (slug) VALUES (:slug)";
        $db->prepare($sql)->execute($data); 
         
        
        $_SESSION['message']="A new section has been added";
        
      }
    }       

   //##################################################################################
   
  if($postit == "delete_section") {
                     
        $slug= $_POST['slug'];
        
        $find = $db->prepare("SELECT * FROM sections WHERE slug = :slug");
        $find->execute(['slug' => $slug]);
        $section = $find->fetch();
        
        if($section) {
        
            $sql = 'DELETE FROM sections WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $section['id'], PDO::PARAM_INT);
            if ($statement->execute()) {
            
                $sql2 = 'DELETE FROM page_sections WHERE section_slug = :section_slug';
                $statement2 = $db->prepare($sql2);
                $statement2->bindParam(':section_slug', $slug, PDO::PARAM_STR);
                $statement2->execute();
            
                $sql2 = 'DELETE FROM section_features WHERE slug = :slug';
                $statement2 = $db->prepare($sql2);
                $statement2->bindParam(':slug', $slug, PDO::PARAM_STR);
                $statement2->execute();

                $sql2 = 'DELETE FROM section_parts WHERE slug = :slug';
                $statement2 = $db->prepare($sql2);
                $statement2->bindParam(':slug', $slug, PDO::PARAM_STR);
                $statement2->execute();
                
                $_SESSION['message']="The section has been deleted";     
            }

        } 
   } 
    

  $find = $db->prepare("SELECT * FROM sections WHERE showit = 1 ORDER BY rank ASC");
  $find->execute();
  $sections = $find->fetchAll();

?>