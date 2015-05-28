<?php
class loginquery extends login{
	function __construct() {
		//note you can't use $this->username because the value of this var has changed because not in the same class
		//echo "</br>sudah di login query ".parent::$username;
		$login= new dbCenter("user");
		$data=$login->ambilDataDenganKondisi(array
		(
			"username"=>parent::$username,
			"pass"=>parent::$pass,
			"berlaku"=>"1",
		));
		$row_count = count($data);
		if ($row_count==0)
		{
			echo "Username Atau Password anda salah<br>";
			echo '<a href="../index.php">Coba Lagi</a>';
		}
		else 
		{
			$_SESSION['sista_id']=$data[0]['username'];
			$_SESSION['sista_name']=$data[0]['name'];			
			$idjenisuser=$data[0]['id_jenis_user'];
			$login= new dbCenter("jenis_user");
			$data=$login->ambilDataDenganKondisi(array
			(
				"id_jenis_user"=>$idjenisuser,
			));			
			$_SESSION['sista_jenis_user']=$data[0]['jenis_user'];
			header("Location:?route=mypanel");
		}
	}	
}
?>