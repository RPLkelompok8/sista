<?php
class index extends router{
	private static $appUserID;
	public static $username;
	public static $pass;
		
	private $confview;
	private $confmodel;
	
	public static $isitabel="";
	public static $controlhalaman="";
	
	function __construct() {
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->footer();
	}
	public function prepareview(){	
		$modelmypanel=parent::$route.'query';
		require 'models/'.$modelmypanel.".php";
		$this->confmodel = new $modelmypanel();	
	
		$viewmypanel=parent::$route.'page';
		require 'views/'.$viewmypanel.'.php';
		$this->confview= new $viewmypanel();
	}
}
?>