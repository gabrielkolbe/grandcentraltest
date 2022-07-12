<?php

foreach(PAGELIST as $section) {
if($section['display'] == 'yes') { 
  include (APP."/sections/".$section['slug'].".php"); 
}
}
?>