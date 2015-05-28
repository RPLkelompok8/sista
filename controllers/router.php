<?php
class router{
	public static $route;
	public static $needlogin=false;
	function __construct() {
		if(isset($_GET['route'])){self::$route=$_GET['route'];}else{self::$route="index";}
		require "controllers/".self::$route.".php";
		if(file_exists('models/'.self::$route.'query.php')){
			require_once 'models/dbCenter.php';}
		else{
			if(isset($_SESSION['sista_jenis_user'])){
				if(file_exists('models/'.self::$route.$_SESSION['sista_jenis_user'].'query.php')){
					require_once 'models/dbCenter.php';}						
			}					
		}
		$action = new self::$route();
		if(self::$needlogin==true){
			if (isset($_SESSION['sista_id'])){
				$action->initializing();
			}
			else{
				echo "restricted area, you have to log your account in 
						</br><a href='?route=login'>login</a>";
			}
		}			
	}
}

?>