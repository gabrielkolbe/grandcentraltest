 <?php
 
define('SLUG', $_GET['slug']);
 

$title = '';
$contentdesc = '';
$keywords = ''; 
$content = ''; 



//################################################################################## 

  if($postit == "editpage") {
  

    $err = '';
  	if ($_POST['name'] == ""){ $err .="Name is empty - "; }
  
        if($err != '') {
           $_SESSION['message'] = $err;
        } else {
                  
        $metadescrip = '';
        $keywords = '';        
        
        if(isset($_POST['menu'])) { $menu= ucwords(strtolower(sanitzehtml($_POST['menu']))); }
        if(isset($_POST['metadescrip'])) { $metadescrip = $_POST['metadescrip']; }
        if(isset($_POST['keywords'])) { $keywords = $_POST['keywords']; }     
        
        if(isset( $_POST['displaypage']) ) { $displaypage = 'yes'; } else { $displaypage = 'no'; }
        
        $update = [
          'name' => $_POST['name'],
          'menu' => $menu,
          'displaymenu' => $displaypage,
          'metadescrip' => $metadescrip,
          'keywords' => $keywords,
          'slug' => $_POST['slug'],          
        ];
      
        $sql = "UPDATE pages SET name=:name, menu=:menu, displaymenu=:displaymenu, metadescrip=:metadescrip, keywords=:keywords WHERE slug=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
        
        $heading = '';

        if(isset($_POST['heading'])) { $heading = $_POST['heading']; }
        
          $find = $db->prepare("SELECT * FROM page_features WHERE slug='".$_POST['slug']."'");
          $find->execute();
          $feature = $find->fetch();
          
          $updatefeatures = [
            'heading' => $heading,
            'slug' => $_POST['slug'],          
          ];
          
          if(!$feature) { 
              $sql = "INSERT INTO page_features (slug, heading) VALUES (:heading, :slug)";
              $db->prepare($sql)->execute($updatefeatures);
          } else { 
              $sql = "UPDATE page_features SET heading=:heading WHERE slug=:slug";
              $stmt= $db->prepare($sql);
              $stmt->execute($updatefeatures);
          }
    
        
        $_SESSION['message']="The page has been updated";
        header ("location: /dashboard/pages");
        exit();
          
      }

     }

//##################################################################################

     if($postit == "reorder_pages") {
     
     $slug= $_POST['slug'];

    $ranks = $_POST['rank'];
    foreach($ranks as $key => $value) {
    
        $update = [
          'rank' => $key,
          'section_slug' => $value,
          'slug' => $slug    
        ];
        
        $sql = "UPDATE page_sections SET rank=:rank WHERE section_slug=:section_slug AND page=:slug";
        $stmt= $db->prepare($sql);
        $stmt->execute($update);
    }
  
    $_SESSION['message']="The sections has been reordered for this page";
   }
   
//##################################################################################

  if($postit == "addapagesection") {

        
        $find = $db->prepare("SELECT * FROM page_sections WHERE page='".$_POST['slug']."' AND section_slug = '".$_POST['section']."'");
        $find->execute();
        $found = $find->fetch();
        if($found) {
          $_SESSION['message']="Section already exists on this page";
        } else {
    
            $find = $db->prepare("SELECT * FROM sections WHERE slug='".$_POST['section']."'");
            $find->execute();
            $section = $find->fetch();
        
            $data = [
            'page' => $_POST['slug'],
            'section_name' => $section['name'],
            'section_slug' => $section['slug']
            ];
            
            //var_dump($data);
           // die;
            
            $sql = "INSERT INTO page_sections (page, section_name, section_slug) VALUES (:page, :section_name, :section_slug)";
            $db->prepare($sql)->execute($data);
            $_SESSION['message']="A new section has been added";
        } 
 
    } 

    //##################################################################################

  if($postit == "remove_section") {

        $section_slug = $_POST['section'];
        $page = $_POST['slug'];
        
        $find = $db->prepare("SELECT * FROM page_sections WHERE page='".$page."' AND section_slug = '".$section_slug."'");
        $find->execute();
        $found = $find->fetch();
      //  var_dump($found);
       // die;
        if($found) {
          $sql = 'DELETE FROM page_sections WHERE id = :id';
          $statement = $db->prepare($sql);
          $statement->bindParam(':id', $found['id'], PDO::PARAM_INT);
        
          // execute the statement
          if ($statement->execute()) {
            $_SESSION['message']="Section has been removed";
          } 
        }
  }
  

        
    $find = $db->prepare("SELECT * FROM pages WHERE slug='".SLUG."'");
    $find->execute();
    $page = $find->fetch();

    $find = $db->prepare("SELECT * FROM page_sections WHERE page='".SLUG."' ORDER by rank ASC");
    $find->execute();
    $sections = $find->fetchAll();



?>                                                                  