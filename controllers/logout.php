<?php
class logout extends router{
	function __construct() {		
		if (isset($_SESSION['sista_id']))
		{ 
			unset($_SESSION['sista_id']);
			unset($_SESSION['sista_name']);
			unset($_SESSION['sista_jenis_user']);
			session_destroy();
			header("Location:index.php");
		}
		else{
			echo "You haven't logged in yet.";
		}
	}	
}
?>