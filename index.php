<?PHP



include ("app/setup.php");


include ("app/router.php"); 
 
if(ROUTESOURCE == 'frontend') {

include ("app/templates/".APP."/theme.php");

include (APP."/layouts/".LAYOUT.".php");

} else {
ob_start("ob_gzhandler");
include ("app/layouts/".LAYOUT.".php");
ob_flush();
}



?>