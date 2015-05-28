<?php
require 'dbCenter.php';
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='upload_TA'){
	$fileType = $_FILES["fileTA"]["type"]; // The type of file it is
	$fileSize = $_FILES["fileTA"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["fileTA"]["error"]; // 0 for false... and 1 for true
	//$fileextension = pathinfo($fileName, PATHINFO_EXTENSION); //get extension
	$file1TmpLoc = $_FILES["fileTA"]["tmp_name"]; // File in the PHP tmp folder
	$file2TmpLoc = $_FILES["fileBeritaSeminar"]["tmp_name"];
	$file3TmpLoc = $_FILES["fileBeritaSidang"]["tmp_name"];
	if ((!$file1TmpLoc)||(!$file2TmpLoc)||(!$file3TmpLoc)) { // if file not chosen
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit();
	}
	else{		
		session_start();
		$file1Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileTA"]["name"], PATHINFO_EXTENSION); //file name
		$file2Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileBeritaSeminar"]["name"], PATHINFO_EXTENSION);
		$file3Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileBeritaSidang"]["name"], PATHINFO_EXTENSION);
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$info = getdate();
		$date = $info['mday'];
		$month = $info['mon'];
		$year = $info['year'];	
		$conf=new dbCenter("ta2");
		$conf->siapkanRecord(array(
			"username"=>$_SESSION['sista_id'],
			"judul"=>strtoupper($_POST['judulTA']),
			"abstrak"=>$_POST['abstrakTA'],
			"tanggal_posting"=>$date,
			"bulan_posting"=>$month,
			"tahun_posting"=>$year,
			"id_kategori"=>$_POST['kategoriTA'],
			"file_ta"=>$file1Name,
			"bukti_seminar"=>$file2Name,
			"bukti_sidang"=>$file3Name,
			"ditampilkan"=>0,
			"dilihat"=>0
			));
			$conf->simpan();
		if ((move_uploaded_file($file1TmpLoc, "../documents/tugas_akhir/fileTA/".$file1Name))&&
			(move_uploaded_file($file2TmpLoc, "../documents/tugas_akhir/bukti_seminar/".$file2Name))&&
			(move_uploaded_file($file3TmpLoc, "../documents/tugas_akhir/bukti_sidang/".$file3Name))){
			echo "Tugas Akhir Anda Berhasil Diunggah.";
		} else {
			echo "move_uploaded_file function failed";
		}
	}	
}
if($op=='update_TA'){
	session_start();
	if(isset($_FILES["fileTA"]["tmp_name"])){
		$conf=new dbCenter("");
		$data=$conf->executeQuery("select file_ta from ta2 where username=".$_SESSION['sista_id']."");
		unlink ("../documents/tugas_akhir/fileTA/".$data[0]['file_ta']);
		$file1TmpLoc = $_FILES["fileTA"]["tmp_name"]; // File in the PHP tmp folder
		$file1Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileTA"]["name"], PATHINFO_EXTENSION); //file name
		move_uploaded_file($file1TmpLoc, "../documents/tugas_akhir/fileTA/".$file1Name);
		$cak["file_ta"]=$file1Name;
	}
	if(isset($_FILES["fileBeritaSeminar"]["tmp_name"])){
		$conf=new dbCenter("");
		$data=$conf->executeQuery("select bukti_seminar from ta2 where username=".$_SESSION['sista_id']."");
		unlink ("../documents/tugas_akhir/bukti_seminar/".$data[0]['bukti_seminar']);	
		$file2TmpLoc = $_FILES["fileBeritaSeminar"]["tmp_name"];
		$file2Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileBeritaSeminar"]["name"], PATHINFO_EXTENSION);
		move_uploaded_file($file2TmpLoc, "../documents/tugas_akhir/bukti_seminar/".$file2Name);
		$cak["bukti_seminar"]=$file2Name;
	}
	if(isset($_FILES["fileBeritaSidang"]["tmp_name"])){
		$conf=new dbCenter("");
		$data=$conf->executeQuery("select bukti_sidang from ta2 where username=".$_SESSION['sista_id']."");
		unlink ("../documents/tugas_akhir/bukti_sidang/".$data[0]['bukti_sidang']);
		$file3TmpLoc = $_FILES["fileBeritaSidang"]["tmp_name"];
		$file3Name = $_SESSION['sista_id'].".".pathinfo($_FILES["fileBeritaSidang"]["name"], PATHINFO_EXTENSION);
		move_uploaded_file($file3TmpLoc, "../documents/tugas_akhir/bukti_sidang/".$file3Name);
		$cak["bukti_sidang"]=$file3Name;
	}			
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$info = getdate();
		$date = $info['mday'];
		$month = $info['mon'];
		$year = $info['year'];
		$cak["judul"]=strtoupper($_POST['judulTA']);
		$cak["abstrak"]=$_POST['abstrakTA'];
		$cak["id_kategori"]=$_POST['kategoriTA'];
		$cak["ditampilkan"]="0";
		$conf=new dbCenter("ta2");
		$conf->siapkanRecord($cak);
		$conf->editBerdasarkan(array (
			"username"=>$_SESSION['sista_id']
		));
		echo "Tugas Akhir Anda Berhasil Diunggah.";
}
if ($op=='test'){
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$info = getdate();
		$date = $info['mday'];
		$month = $info['mon'];
		$year = $info['year'];
		echo $date."-".$month."-".$year;
}
if	($op=="deleteTAmahasiswa"){
	$conf=new dbCenter("ta2");
	$data=$conf->executeQuery("select file_ta, bukti_seminar, bukti_sidang from ta2 where username=".$_GET['BP']."");
	$conf->hapusDenganKondisi (array(
	"username"=>$_GET['BP']
	));	
	unlink ("../documents/tugas_akhir/fileTA/".$data[0]['file_ta']);
	unlink ("../documents/tugas_akhir/bukti_seminar/".$data[0]['bukti_seminar']);
	unlink ("../documents/tugas_akhir/bukti_sidang/".$data[0]['bukti_sidang']);
	echo "Tugas Akhir berhasil dihapus.";
}
if	($op=="mintasidangTA"){
	session_start();
	date_default_timezone_set('Asia/Jakarta'); // CDT
	$info = getdate();
	$date = $info['mday'];
	$month = $info['mon'];
	$year = $info['year'];
	$conf=new dbCenter("");
	$data=$conf->executeQuery("select id_mintasidang from permintaan_sidangta order by id_mintasidang desc limit 1");
	$row_count = count($data);
	if($row_count==0){$urutan=1;}
	else {foreach($data as $tara){$urutan=$tara["id_ta"]+1;}}	
	$conf=new dbCenter("permintaan_sidangta");
	$conf->siapkanRecord(array(
	"id_mintasidang"=>$urutan,
	"username"=>$_SESSION['sista_id'],
	"tgl_mintasidang"=>$date,
	"bln_mintasidang"=>$month,
	"th_mintasidang"=>$year,
	"dapat_giliran"=>"0"
	));
	$conf->simpan();
}
?>