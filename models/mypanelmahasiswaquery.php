<?php
class mypanelmahasiswaquery extends mypanelmahasiswa{
	//public $dataRow = array();
	function __construct() {
	}
	public function getsemuakategorita(){
		$conf=new dbCenter("kategori_ta");
		$data=$conf->ambilSemua();
		$row_count = count($data);
		$result="";
		if ($row_count==0){
			$result="<option>tabel kosong</option>";
		}
		else{			
			foreach ($data as $isi){$result.="<option value='".$isi['id_kategori']."'>".$isi['kategori']."</option>";}
		}
		return $result;		
	}
	public function checkuploadedta(){
		$conf= new dbCenter("ta2");
		$data=$conf->ambilDataDenganKondisi(array
		(
			"username"=>$_SESSION['sista_id']
		));
		$row_count = count($data);
		if ($row_count==0){return 0;}
		else{
			parent::$judulTA=$data[0]['judul'];
			parent::$tglpostingTA=$data[0]['tanggal_posting'];
			parent::$tglpostingTA.=" - ".$data[0]['bulan_posting'];
			parent::$tglpostingTA.=" - ".$data[0]['tahun_posting'];
			parent::$idkategoriTA=$data[0]['id_kategori'];
			return 1;						
		}
	}
	public function carikategoriTA($idkategori){
		$conf= new dbCenter("kategori_ta");
		$data=$conf->ambilDataDenganKondisi(array
		(
			"id_kategori"=>$idkategori
		));
		parent::$kategoriTA=$data[0]['kategori'];
	}
	public function checkfinalsession(){
		$conf= new dbCenter("sidangta");
		$data=$conf->ambilDataDenganKondisi(array
		(
			"username"=>$_SESSION['sista_id']
		));
		$row_count = count($data);
		if ($row_count==0){
			$conf= new dbCenter("permintaan_sidangTA");
			$data=$conf->ambilDataDenganKondisi(array
			(
				"username"=>$_SESSION['sista_id'],
				"dapat_giliran"=>"0"
			));
			$row_count = count($data);
			if ($row_count==0){parent::$reqfinalsession=0;}
			else{parent::$reqfinalsession=1;}
			return 0;
		}
		else{
			return 1;						
		}
	}
	public function rubahpassword(){
		$passlama=$_POST['passlama'];
		$passbaru=$_POST['passbaru'];
		$repassbaru=$_POST['repassbaru'];
		if(($passlama!="")&&($passbaru!="")&&($repassbaru!="")){
			if($passbaru!=$repassbaru){
				header("Location:?route=mypanel&action=ubahpassword&error=konfirmasi password tidak cocok");
			}
			else{
				$login= new dbCenter("user");
				$data=$login->ambilDataDenganKondisi(array
				(
					"username"=>$_SESSION['sista_id'],
				));
				if($data[0]['pass']!=$passlama){
					header("Location:?route=mypanel&action=ubahpassword&error=Password lama tidak serupa.");
				}
				else{
					$conf= new dbCenter("user");
					$conf->siapkanRecord(array(
						"pass"=>$_POST['passbaru']
					));
					$conf->editBerdasarkan(array (
						"username"=>$_SESSION['sista_id']
					));
					header("Location:?route=mypanel");				}				
			}
		}
		else{
			header("Location:?route=mypanel&action=ubahpassword&error=Lengkapi semua field");
		}
	}
	public function EditTAAct(){
		$login= new dbCenter("ta2");
		$data=$login->ambilDataDenganKondisi(array
		(
			"username"=>$_SESSION['sista_id'],
		));
		$login= new dbCenter("kategori_ta");
		$data1=$login->ambilSemua();
		$katstring='';
		foreach ($data1 as $kat){
			if($kat['id_kategori']==$data[0]['id_kategori']){$selected=" selected";}else{$selected="";}
			$katstring.='<option value="'.$kat['id_kategori'].'"'.$selected.'>'.$kat['kategori'].'</option>';
		}
		return '<form role="form" enctype="multipart/form-data" method="post">							
					<div class="form-group" id="divfieldjudulTA">
						<label>Judul Tugas Akhir</label>
						<input type="text" class="form-control" placeholder="Judul Tugas Akhir" id="fieldjudulTA" maxlength="200" value="'.$data[0]['judul'].'">
					</div>
					<div class="form-group" id="divfieldkategoriTA">
						<label>Kategori</label>
						<select class="form-control" id="fieldkategoriTA">'.$katstring.'
						</select>
					</div>														
					<div class="form-group" id="divfieldabstrakTA">
						<label>Abstrak</label>
						<textarea class="form-control" rows="6" id="fieldabstrakTA" maxlength="10000">'.$data[0]['abstrak'].'</textarea>
					</div>
					<div class="form-group" id="divgroupinputfileTA">
						<label>Berkas Tugas Akhir</label>
						<p class="help-block">Masukkan file baru jika ingin merubah.</p>
						<div id="divinputfileTA"><input type="file" name="fileTA" id="fileTA" onchange="checkfile(\'divinputfileTA\', \'fileTA\', \'10240000\', \'pdf\')" required/></div>
						<p class="help-block">File harus ber-format ".pdf" & max size 10Mb</p>
					</div>
					<div class="form-group" id="divgroupinputfileBeritaSeminar">
						<label>Bukti Berita Acara Seminar Tugas Akhir</label>
						<p class="help-block">Masukkan file baru jika ingin merubah.</p>
						<div id="divinputfileBeritaSeminar"><input type="file" name="fileBeritaSeminar" id="fileBeritaSeminar" onchange="checkfile(\'divinputfileBeritaSeminar\', \'fileBeritaSeminar\', \'3072000\', \'\')" required/></div>
						<p class="help-block">max size 3Mb</p>
					</div>
					<div class="form-group" id="divgroupinputfileBeritaSidang">
						<label>Bukti Berita Acara Sidang Tugas Akhir</label>
						<p class="help-block">Masukkan file baru jika ingin merubah.</p>
						<div id="divinputfileBeritaSidang"><input type="file" name="fileBeritaSidang" id="fileBeritaSidang" onchange="checkfile(\'divinputfileBeritaSidang\', \'fileBeritaSidang\', \'3072000\', \'\')" required/></div>
						<p class="help-block">max size 3Mb</p>
					</div>
					<input type="button" value="Unggah" onclick="updateTA()" class="btn btn-primary">
					<input type="reset" value="Reset" class="btn btn-default">
					</form>';
	}
}
?>