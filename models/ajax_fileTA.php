<?php
require 'dbCenter.php';
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='aktifkanFileTA'){
	$conf= new dbCenter("ta2");
	$conf->siapkanRecord(array(
		"ditampilkan"=>1
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
}
if($op=='matikanFileTA'){
	$conf= new dbCenter("ta2");
	$conf->siapkanRecord(array(
		"ditampilkan"=>0
	));
	$conf->editBerdasarkan(array (
		"username"=>$_GET['BP']
	));
}
if($op=='lihatDetail'){
	$conf= new dbCenter("user");
	$data1=$conf->ambilDataDenganKondisi(array
	(
		"username"=>$_GET['BP'],
	));
	$conf= new dbCenter("ta2");
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
	$conf= new dbCenter("kategori_ta");
	$data3=$conf->ambilDataDenganKondisi(array
	(
		"id_kategori"=>$data2[0]['id_kategori']
	));
	$tanggal=$data2[0]['tanggal_posting']."-".$data2[0]['bulan_posting']."-".$data2[0]['tahun_posting'];
	$pesan=$data1[0]['username']."|*~".$data1[0]['name']."|*~";
	$pesan.=$data2[0]['judul']."|*~".$data2[0]['abstrak']."|*~".$tanggal."|*~".$data3[0]['kategori']."|*~".$data2[0]['file_ta']."|*~".$data2[0]['bukti_seminar']."|*~".$data2[0]['bukti_sidang']."|*~".$perubahan;
	echo $pesan;
	//echo "sukses";
}
if($op=='notifLihatTA'){
	$sql = "SELECT username,dilihat,tanggal_posting,bulan_posting,tahun_posting FROM ta2 where dilihat!='1'";
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
								<a href="#" onclick="detailFileTA(\''.$tara["username"].'\', event)"><strong>'.$nama.'</strong> Mencoba Memposting <strong>Tugas Akhir</strong>.</a>
							<br/>
							<small class="text-muted">'.$tara["tanggal_posting"]." - ".$tara["bulan_posting"]." - ".$tara["tahun_posting"].'</small>
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
		if($JmlhBlmDlht==0){$JmlhBlmDlht="";}
		echo $JmlhBlmDlht.'+=|=+'.$isi;
}
?>