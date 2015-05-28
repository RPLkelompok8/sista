<?php
require 'dbCenter.php';
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='lihatDetail'){
	//echo $_GET['BP'];
	$conf= new dbCenter("user");
	$data1=$conf->ambilDataDenganKondisi(array
	(
		"username"=>$_GET['BP'],
	));
	$conf= new dbCenter("registrasimhs");
	$data2=$conf->ambilDataDenganKondisi(array
	(
		"username"=>$_GET['BP'],
	));
	if($data2[0]['dilihat']!=1){
		$conf->siapkanRecord(array(
			"dilihat"=>1
		));
		$conf->editBerdasarkan(array (
			"username"=>$_GET['BP']
		));
		$perubahan=1;
	}
	else{$perubahan=0;}
	$tanggal=$data2[0]['tanggal']."-".$data2[0]['bulan']."-".$data2[0]['tahun'];
	$pesan=$data1[0]['username']."|*~".$data1[0]['name']."|*~".$data1[0]['pass']."|*~".$data1[0]['email']."|*~";
	$pesan.=$data2[0]['transkrip']."|*~".$data2[0]['krs']."|*~".$data2[0]['spdp']."|*~".$data2[0]['ktm']."|*~".$tanggal."|*~".$perubahan;
	echo $pesan;
	//echo "sukses";
}
if($op=='setujuiRegistrasiMhs'){
	$conf= new dbCenter("registrasimhs");
	$conf->siapkanRecord(array(
		"terverifikasi"=>1
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
	$conf= new dbCenter("user");
	$conf->siapkanRecord(array(
		"berlaku"=>1
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
}
if($op=='batalSetujuRegistrasiMhs'){
	$conf= new dbCenter("registrasimhs");
	$conf->siapkanRecord(array(
		"terverifikasi"=>0
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
	$conf= new dbCenter("user");
	$conf->siapkanRecord(array(
		"berlaku"=>0
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
}
if($op=='hapusPendaftaranRegistrasiMhs'){
	$conf= new dbCenter("registrasimhs");
	$data=$conf->ambilDataDenganKondisi(array(
		"username"=>$_GET['BP']
	));
	$transkrip=$data[0]['transkrip'];
	$krs=$data[0]['krs'];
	$spdp=$data[0]['spdp'];
	$ktm=$data[0]['ktm'];
	$conf= new dbCenter("user");
	$data=$conf->hapusDenganKondisi(array(
		"username"=>$_GET['BP']
	));
	$conf= new dbCenter("registrasimhs");
	$data=$conf->hapusDenganKondisi(array(
		"username"=>$_GET['BP']
	));
	unlink ("../documents/pendaftaranMhs/krs/".$krs);
	unlink ("../documents/pendaftaranMhs/spdp/".$spdp);
	unlink ("../documents/pendaftaranMhs/ktm/".$ktm);
	unlink ("../documents/pendaftaranMhs/transkrip/".$transkrip);
}
if($op=='notifLihatRegMhs'){
	$sql = "SELECT username,dilihat,tanggal,bulan,tahun FROM registrasimhs where dilihat!='1'";
		$cariname=new dbCenter("");
		$data1=$cariname->executeQuery($sql);
		$JmlhBlmDlht=count($data1);
		$isi='';
		foreach ($data1 as $tara){
			$sql = "SELECT name FROM user where username='".$tara["username"]."'";
			$cariusername=new dbCenter("");
			$data1=$cariusername->executeQuery($sql);
			$nama=str_replace("[|*apstrf*|]","'", $data1[0]["name"]);
			$isi.='<li>
					<div class="dropdown-messages-box">
						<a href="#" class="pull-left">
							<span class="glyphicon glyphicon-check glyphicon-l"></span>
						</a>
						<div class="message-body">
							<small class="pull-right"></small>
								<a href="#" onclick="detailPendaftaranMhs(\''.$tara["username"].'\', event)"><strong>'.$nama.'</strong> Memohon Untuk <strong>Persetujuan Pendaftaran</strong>.</a>
							<br/>
							<small class="text-muted">'.$tara["tanggal"]." - ".$tara["bulan"]." - ".$tara["tahun"].'</small>
						</div>
					</div>
				</li>
				<li class="divider"></li>';			
		}
		if($JmlhBlmDlht>0){
			$isi.='	<li>
						<div class="all-button">
							<a href="#">
								<em class="glyphicon glyphicon-inbox"></em> <strong>All Messages</strong>
							</a>
						</div>
					</li>';
		}
		//$BlmDlht=$isi;
		if($JmlhBlmDlht==0){$JmlhBlmDlht="";}
		echo $JmlhBlmDlht.'+=|=+'.$isi;
}
?>