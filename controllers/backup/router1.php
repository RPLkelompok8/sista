<?php
class router{
	public static $route;
	function __construct() {
		if (isset($_GET['route'])){
			if ((isset($_SESSION['sista_id']))||($_GET['route']=='login')){
				self::$route=$_GET['route'];
				require self::$route.".php";
				if(file_exists('models/'.self::$route.'query.php')){
				require 'models/dbCenter.php';}
				$action = new self::$route();
			}
			else{
				echo "restricted area, you have to log your account in";
			}					
		}

		else {
			/*require 'login.php';
			$login = new login();*/				
		}			
	}
}

?>