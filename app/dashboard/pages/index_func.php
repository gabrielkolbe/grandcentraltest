 <?php

if($postit == "reorder_pages") {

    $ranks = $_POST['rank'];
    foreach($ranks as $key => $value) {
    
        $update = [
          'rank' => $key,
          'slug' => $value    
        ];
        
        $sql = "UPDATE pages SET rank=:rank WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
    }
  
    $_SESSION['message']="The pages has been reordered";
   }
   
   //##################################################################################
   
   
if($postit == "addapage") {

    $err = '';
  	if ($_POST['name'] == ""){ $err .="Name is empty - "; }
  
        if($err != '') {
           $_SESSION['error'] = $err;
        } else {
                     
        $name = $_POST['name'];
        $metadescrip = $_POST['metadescrip'];
        $keywords = $_POST['keywords'];
        $slug = slugmaker($name);
        
        $data = [
        'name' => $name,
        'slug' => $slug,
        'menu' => $name,
        'metadescrip' => $metadescrip,
        'keywords' => $keywords,
        'source' => 'new',
        'showit' => '1'
        ];
        
        $sql = "INSERT INTO pages (name, slug, menu, metadescrip, keywords, source, showit) VALUES (:name, :slug, :menu, :metadescrip, :keywords, :source, :showit)";
        $db->prepare($sql)->execute($data);
        
        $data = [
        'heading' => $name,
        'slug' => $slug
        ];
        
        $sql = "INSERT INTO page_features (heading, slug) VALUES (:heading, :slug)";
        $db->prepare($sql)->execute($data);
        
        
        $_SESSION['message']="A new page has been added";
        
      }
    }  
   
   //##################################################################################
   
  if($postit == "delete_page") {
                     
        $slug= $_POST['slug'];
        
        $find = $db->prepare("SELECT * FROM pages WHERE slug = :slug");
        $find->execute(['slug' => $slug]);
        $section = $find->fetch();
        
        if($section) {
        
            $sql = 'DELETE FROM pages WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $section['id'], PDO::PARAM_INT);
            if ($statement->execute()) {
            
                $sql2 = 'DELETE FROM page_sections WHERE page = :page';
                $statement2 = $db->prepare($sql2);
                $statement2->bindParam(':page', $slug, PDO::PARAM_STR);
                $statement2->execute();
            
                $sql2 = 'DELETE FROM page_features WHERE slug = :slug';
                $statement2 = $db->prepare($sql2);
                $statement2->bindParam(':slug', $slug, PDO::PARAM_STR);
                $statement2->execute();

            
              $_SESSION['message']="The page has been deleted";     
            }

        } 
   } 
   
   

  $find = $db->prepare("SELECT * FROM pages WHERE showit = 1 ORDER BY rank ASC");
  $find->execute();
  $pages = $find->fetchAll();

?>