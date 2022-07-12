<?php 

if($postit == "colour_edit") {
  
        $colour= $_POST['colour'];
        $name= $_POST['name'];
        $thisorall= $_POST['thisorall'];
        if($thisorall == 'this'){
        
        $colour = trim($colour);
        
          $update = [
            'colour' => $colour,
            'name' => $name,       
          ];
          
          $sql = "UPDATE colours SET colour=:colour WHERE name=:name";
          $stmt= $db->prepare($sql);
          $stmt->execute($update);
        
        }
        
        if($thisorall == 'all'){

          $colour = trim($colour);
          
         // $sql�=�"UPDATE�colours�SET�colour=?�WHERE�colour=?";
        //  $stmt=�$pdo->prepare($sql);
        //  $stmt->execute([$colour,�$colour]);
        
        }
      

        
        include ("app/templates/".APP."/cssmaster.php"); 

        $_SESSION['message']="The colours has been updated";

  }
  
?>