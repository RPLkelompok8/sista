<?php
class mypanel extends router{
	function __construct() {
		require 'views/'.parent::$route.'page.php';
		$funcvar=parent::$route."page";
		$login= new $funcvar();
		$login->nameloggedin=$_SESSION['sista_name'];
		$login->header();
		$login->body();
		$login->footer();
	}	
}
?>