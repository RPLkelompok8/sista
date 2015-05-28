<?php
class registrasiTAmhs extends router{
	/*function __construct() {
		parent::$needlogin=true;
	}*/
	function __construct() {		
		$viewregistrasiTAmhs=parent::$route.'page';
		require_once 'views/'.$viewregistrasiTAmhs.'.php';
		$regsistrasi= new $viewregistrasiTAmhs();
		$regsistrasi->header();
		$regsistrasi->body();
		$regsistrasi->footer();		
	}
}
?>