<?php
require 'dbCenter.php';
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='hapusKategoriTA'){
	$conf= new dbCenter("kategori_ta");
	$data=$conf->hapusDenganKondisi(array(
		"id_kategori"=>$_GET['ID']
	));
}
?>