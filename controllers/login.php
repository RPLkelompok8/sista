<?php
class login extends router{
	private static $appUserID;
	public static $username;
	public static $pass;
	function __construct() {			
		if (isset($_SESSION['sista_id'])){
			header("Location:?route=mypanel");
			//echo "udah login";
		}
		else{
			if (isset($_POST['idlogin'])&&isset($_POST['passlogin'])){
				self::$username=$_POST['idlogin'];
				self::$pass=$_POST['passlogin'];
				require 'models/'.parent::$route."query.php";
				$funcvar=parent::$route."query";
				$conf = new $funcvar();
			}
				require 'views/'.parent::$route.'page.php';
				$funcvar=parent::$route."page";
				$login= new $funcvar();
				$login->header();
				$login->body();
				$login->footer();	
		}
			//self::$appUserID = $_SESSION['sista_id'];			
			//echo "this is login.php";
	}	
}
?>