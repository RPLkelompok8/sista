<?php
require 'dbCenter.php';
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='checkBP'){
	//echo $_GET['BP'];
	$conf= new dbCenter("user");
	$data=$conf->ambilDataDenganKondisi(array
	(
	"username"=>$_GET['BP'],
	));
	$row_count = count($data);
	if ($row_count==0)
	{
		echo 0;
	}
	else 
	{
		if($data[0]['berlaku']=='0'){echo 1;}
		if($data[0]['berlaku']=='1'){echo 2;}			
	}
}
if($op=='registrasiMhs'){
	date_default_timezone_set('Asia/Jakarta'); // CDT
	$info = getdate();
	$date = $info['mday'];
	$month = $info['mon'];
	$year = $info['year'];
	$file1TmpLoc = $_FILES["fileTranskrip"]["tmp_name"];
	$file2TmpLoc = $_FILES["fileKRS"]["tmp_name"];
	$file3TmpLoc = $_FILES["filePembimbing"]["tmp_name"];
	$file4TmpLoc = $_FILES["fileKTM"]["tmp_name"];
	$file1Name = $_POST['BP'].".".pathinfo($_FILES["fileTranskrip"]["name"], PATHINFO_EXTENSION);
	$file2Name = $_POST['BP'].".".pathinfo($_FILES["fileKRS"]["name"], PATHINFO_EXTENSION);
	$file3Name = $_POST['BP'].".".pathinfo($_FILES["filePembimbing"]["name"], PATHINFO_EXTENSION);
	$file4Name = $_POST['BP'].".".pathinfo($_FILES["fileKTM"]["name"], PATHINFO_EXTENSION);
	$conf=new dbCenter("user");
	$conf->siapkanRecord(array(
	"username"=>$_POST['BP'],
	"name"=>$_POST['namamhs'],
	"pass"=>$_POST['passlogin'],
	"id_jenis_user"=>"2",
	"email"=>$_POST['emailmhs'],
	"berlaku"=>"0"
	));
	$conf->simpan();
	$conf=new dbCenter("registrasimhs");
	$conf->siapkanRecord(array(
	"username"=>$_POST['BP'],
	"transkrip"=>$file1Name,
	"krs"=>$file2Name,
	"spdp"=>$file3Name,
	"ktm"=>$file4Name,
	"tanggal"=>$date,
	"bulan"=>$month,
	"tahun"=>$year,
	"terverifikasi"=>0,
	"dilihat"=>""
	));
	$conf->simpan();
	move_uploaded_file($file1TmpLoc, "../documents/pendaftaranMhs/transkrip/".$file1Name);
	move_uploaded_file($file2TmpLoc, "../documents/pendaftaranMhs/krs/".$file2Name);
	move_uploaded_file($file3TmpLoc, "../documents/pendaftaranMhs/spdp/".$file3Name);
	move_uploaded_file($file4TmpLoc, "../documents/pendaftaranMhs/ktm/".$file4Name);
}
if($op=='matikanAkunMhs'){
	$conf= new dbCenter("user");
	$conf->siapkanRecord(array(
	"berlaku"=>0
	));
	$conf->editBerdasarkan(array (
	"username"=>$_GET['BP']
	));
}
if($op=='aktifkanAkunMhs'){
	$conf= new dbCenter("user");
	$conf->siapkanRecord(array(
	"berlaku"=>1
	));
	$conf->editBerdasarkan(array (
	"username"=>$_GET['BP']
	));
}
?>