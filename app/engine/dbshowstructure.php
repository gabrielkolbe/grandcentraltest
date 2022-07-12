<?PHP


    $findtables = $db->prepare("SHOW TABLES");
    $findtables->execute();
    $tables = $findtables->fetchAll();

		foreach ($tables as $liveTablekey => $liveTablevalue) {
            
      $table =$liveTablevalue[0];
      $sql = 'SHOW COLUMNS FROM ' . $table; 
      $showcolumns = $db->prepare($sql);
      if ($showcolumns->execute()) {
          $structure = $showcolumns->fetchAll(PDO::FETCH_ASSOC);

 
      $value = '';
      $tableline = "'".$table."'";

      $next = ' => [ <BR>';
      $value = $tableline.$next;

      foreach($structure as $strkey => $strval) {

       $topline = "'".$strkey."' => [";
       $value = $value.$topline;

      $i = 0;
       foreach($strval as $colkey => $colval) {
         $line = $i."=>'".$colval."',";
         $value = $value.$line;
         $i++;
       }
         $value = $value.'],<BR>';

      }
      
      $value = $value.'],';
      
      $value = $value.'<BR><BR>';
                          
      $data = explode(')"', $value);
      $table = $data['0'];
      echo $table;
      
      } 
		}
     

  


?>