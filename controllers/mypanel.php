<?php
class mypanel extends router{
	function __construct() {
		parent::$needlogin=true;
	}	
	public function initializing(){
		$mypanelchild=parent::$route.$_SESSION['sista_jenis_user'];
		require_once 'controllers/'.$mypanelchild.".php";
		new $mypanelchild();	
	}
}
?>