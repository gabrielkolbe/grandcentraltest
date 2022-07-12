<?PHP



		

	function check($db)
  {
  $officialStruct =
[

'ecom_categories' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'name',1=>'varchar(50)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'slug',1=>'varchar(50)',2=>'YES',3=>'',4=>'',5=>'',],
'3' => [0=>'noprod',1=>'int(5)',2=>'NO',3=>'',4=>'',5=>'',],
],

'images' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'name',1=>'varchar(20)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'original',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'3' => [0=>'role',1=>'varchar(10)',2=>'YES',3=>'',4=>'',5=>'',],
'4' => [0=>'alttags',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'5' => [0=>'size',1=>'varchar(10)',2=>'NO',3=>'',4=>'',5=>'',],
'6' => [0=>'width',1=>'int(5)',2=>'NO',3=>'',4=>'',5=>'',],
'7' => [0=>'height',1=>'int(5)',2=>'NO',3=>'',4=>'',5=>'',],
],

'keywords' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'name',1=>'varchar(20)',2=>'YES',3=>'',4=>'',5=>'',],
],

'pages' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'title',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'2' => [0=>'slug',1=>'varchar(50)',2=>'YES',3=>'UNI',4=>'',5=>'',],
'3' => [0=>'contentdesc',1=>'varchar(100)',2=>'NO',3=>'',4=>'',5=>'',],
'4' => [0=>'keywords',1=>'varchar(200)',2=>'NO',3=>'',4=>'',5=>'',],
'5' => [0=>'content',1=>'text',2=>'NO',3=>'',4=>'',5=>'',],
'6' => [0=>'route',1=>'varchar(20)',2=>'NO',3=>'',4=>'',5=>'',],
'7' => [0=>'layout',1=>'varchar(20)',2=>'NO',3=>'',4=>'default',5=>'',],
'8' => [0=>'editable_areas',1=>'varchar(200)',2=>'NO',3=>'',4=>'',5=>'',],
'9' => [0=>'cachepage',1=>'varchar(5)',2=>'YES',3=>'',4=>'yes',5=>'',],
'10' => [0=>'created',1=>'timestamp',2=>'YES',3=>'',4=>'',5=>'',],
'11' => [0=>'updated',1=>'timestamp',2=>'YES',3=>'',4=>'',5=>'',],
],

'pages_images' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'page_id',1=>'int(10)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'image_id',1=>'int(10)',2=>'YES',3=>'',4=>'',5=>'',],
],

'sliders' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'name',1=>'varchar(50)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'slug',1=>'varchar(50)',2=>'YES',3=>'',4=>'',5=>'',],
],

'theme' => [
'0' => [0=>'id',1=>'int(10)',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'logo',1=>'varchar(20)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'alttags',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'3' => [0=>'width',1=>'int(5)',2=>'NO',3=>'',4=>'',5=>'',],
'4' => [0=>'height',1=>'int(5)',2=>'NO',3=>'',4=>'',5=>'',],
],

'users' => [
'0' => [0=>'id',1=>'bigint(20) unsigned',2=>'NO',3=>'PRI',4=>'',5=>'auto_increment',],
'1' => [0=>'encoded_id',1=>'varchar(10)',2=>'YES',3=>'',4=>'',5=>'',],
'2' => [0=>'firstname',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'3' => [0=>'lastname',1=>'varchar(50)',2=>'NO',3=>'',4=>'',5=>'',],
'4' => [0=>'email',1=>'varchar(255)',2=>'NO',3=>'',4=>'',5=>'',],
'5' => [0=>'email_verified_at',1=>'timestamp',2=>'YES',3=>'',4=>'',5=>'',],
'6' => [0=>'password',1=>'varchar(255)',2=>'NO',3=>'',4=>'',5=>'',],
'7' => [0=>'email_verify_code',1=>'varchar(20)',2=>'YES',3=>'',4=>'',5=>'',],
'8' => [0=>'role',1=>'varchar(10)',2=>'YES',3=>'',4=>'',5=>'',],
'9' => [0=>'created',1=>'timestamp',2=>'YES',3=>'',4=>'',5=>'',],
'10' => [0=>'updated',1=>'timestamp',2=>'YES',3=>'',4=>'',5=>'',],
],

];
    
    $output = '';
    	
    $findtables = $db->prepare("SHOW TABLES");
    $findtables->execute();
    $currentStruct = $findtables->fetchAll();

		foreach ($currentStruct as $liveTablekey => $liveTablevalue) {
			$tableFound = FALSE;

			foreach ($officialStruct as $tablekey => $tablevalue) {

				if ($tablekey==$liveTablevalue[0]){
					$tableFound = TRUE;
					$sql = 'SHOW COLUMNS FROM ' . $liveTablevalue[0]; 
          $showcolumns = $db->prepare($sql);
          $showcolumns->execute();
          $LiveTableStruct = $showcolumns->fetchAll(PDO::FETCH_ASSOC);
					$output = compareTables($liveTablevalue[0],$LiveTableStruct,$officialStruct,$output);
					
				}
			}
		}
		
		
		foreach ($officialStruct as $okey => $ovalue) {

			  $sqlokey = 'SHOW TABLES like "'.$okey.'"'; 
        $showokey = $db->prepare($sqlokey);
        $showokey->execute();
        $LiveT = $showokey->fetchAll(PDO::FETCH_ASSOC);    
			
			if ($LiveT == []){
				 $output = $output.'<span class="red">Table not found :'.$okey.'</span><BR>';
			}

		}
      return $output;
		
    }	
	
	
	
	
	function compareTables($tablename,$live,$template,$output) {
    
    
		if (array_key_exists($tablename, $template))		{
      
      $thetable = '<H1>'.ucfirst($tablename).'</H1><BR>';
      
      $output = $output.$thetable;
			
			$cached = $template[$tablename];
      
      var_dump($cached); 
			foreach ($live as $lkey => $lvalue) { 
      
      var_dump($live);
      die; 
				
				if(array_key_exists($lkey, $cached)){
					$cvalue = $cached[$lkey];
					if ($lvalue[0] != $cvalue[0]){ $output = $output.'<span class="red">0:Field '.$lvalue[0].' ColName --> Live: '.$lvalue[0].' -- Structure: '.$cvalue[0].'</span>'; } else  { $output = $output.'<span class="green">0:Field '.$lvalue[0].' --> SUCCESS: </span>'; }
					if ($lvalue[1] != $cvalue[1]){ $output = $output.'<span class="red">1:Field '.$lvalue[0].' ColType --> Live: '.$lvalue[1].' -- Structure: '.$cvalue[1].'</span>'; } else  { $output = $output.'<span class="green">1:ColType '.$lvalue[1].' --> SUCCESS: </span>'; }
					if ($lvalue[2] != $cvalue[2]){ $output = $output.'<span class="red">2:Field '.$lvalue[0].' AllowNull --> Live: '.$lvalue[2].' -- Structure: '.$cvalue[2].'</span>'; } else  { $output = $output.'<span class="green">2:AllowNull '.$lvalue[2].' --> SUCCESS:</span>'; }
					if ($lvalue[3] != $cvalue[3]){ $output = $output.'<span class="red">3:Field '.$lvalue[0].' PriKey --> Live: '.$lvalue[3].' -- Structure: '.$cvalue[3].'</span>'; } else  { $output = $output.'<span class="green">3:PriKey '.$lvalue[3].' --> SUCCESS: </span>'; }
				//	if ($lvalue[4] != $cvalue[4]){ $output = $output.''4:Problem found:  Default:' . $tablename .'--> Found: '.$lvalue[4].' -- Expecting: '.$cvalue[4]).'<BR>';}
				} 
				else{
					$output = $output.'<span class="red">1:key mismatch '.$lkey.'</span><BR>';
				}
        
        $output = $output.'<BR><BR>';
			}

		} else {
			$output = $output.'<span class="red">1:Key not found in cache: '.$tablename.'</span><BR>';
		}
		
		return $output;
	}
  
 $check = check($db);
 var_dump($check);

?>