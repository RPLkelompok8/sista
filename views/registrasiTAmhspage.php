<?php
class registrasiTAmhspage extends registrasiTAmhs{
	function __construct() {
	}
	public function header(){
		echo '		
		<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sista Registrasi Mahasiswa</title>

		<link href="libs/css/bootstrap.min.css" rel="stylesheet">
		<link href="libs/css/styles.css" rel="stylesheet">
		<link href="libs/js/cnfrmcstm/cnfrmcstm.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">

		</head>
		<body>';
	}
	public function body(){
		echo '			
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
					<div class="login-panel panel panel-info">
						<div class="panel-heading"><i class="glyphicon glyphicon-file"></i> Pendaftaran Sistem Informasi Tugas Akhir Mahasiswa</div>
						<div class="panel-body">
							<form role="form" action="" method="POST" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group" id="divfieldBP">
										<label>
											Nomor BP :
										</label>
										<input class="form-control" placeholder="Nomor Bp" id="BP" type="text" autofocus="">
									</div>
									<div class="form-group" id="divfieldnamamhs">
										<label>
											Nama Lengkap Mahasiswa :
										</label>
										<input class="form-control" placeholder="Nama Lengkap Mahasiswa" id="namamhs" type="text" value="">
									</div>
									<div class="form-group" id="divfieldemailmhs">
										<label>
											e-mail :
										</label>
										<input class="form-control" placeholder="e-mail" id="emailmhs" type="text" value="">
									</div>
									<div class="form-group" id="divfieldpasslogin">
										<label>
											Password :
										</label>
										<input class="form-control" placeholder="Password" id="passlogin" type="password" value="">
										<p class="help-block" id="ketpassword"></p>
									</div>
									<div class="form-group" id="divfieldrepasslogin">
										<label>
											Ketik Ulang Password :
										</label>
										<input class="form-control" placeholder="Ketik Ulang Password" id="repasslogin" type="password" value="">
									</div>
									<div class="form-group" id="divgroupfileTranskrip">
										<label>Soft Copy Transkrip Min 110 sks :</label>
										<div id="divinputfileTranskrip"><input type="file" id="fileTranskrip" name="fileTranskrip" onchange="checkfile(\'divinputfileTranskrip\', \'fileTranskrip\', \'3072000\', \'\')" required/></div>
										<p class="help-block">Harus sudah lulus / sedang ambil matakuliah Bahasa Indonesia dan Kerja Praktek</p>
									</div>
									<div class="form-group" id="divgroupfileKRS">
										<label>Soft Copy KRS Berisi TAII :</label>
										<div id="divinputfileKRS"><input type="file" id="fileKRS" name="fileKRS" onchange="checkfile(\'divinputfileKRS\', \'fileKRS\', \'3072000\', \'\')" required/></div>
										<p class="help-block">Bukti KRS sudah mengambil TAII</p>
									</div>
									<div class="form-group" id="divgroupfilePembimbing">
										<label>Soft Copy Surat Penunjukan Dosen Pembimbing :</label>
										<div id="divinputfilePembimbing"><input type="file" id="filePembimbing" name="filePembimbing" onchange="checkfile(\'divinputfilePembimbing\', \'filePembimbing\', \'3072000\', \'\')" required/></div>
										<p class="help-block">Surat sudah harus ditandatangani</p>
									</div>
									<div class="form-group" id="divgroupfileKTM">
										<label>Kartu tanda Mahasiswa :</label>
										<div id="divinputfileKTM"><input type="file" id="fileKTM" name="fileKTM" onchange="checkfile(\'divinputfileKTM\', \'fileKTM\', \'3072000\', \'\')" required/></div>
										<p class="help-block">Bukti KTM sebagai keterangan pemilikan sah BP.</p>
									</div>
									<input type="button" class="btn btn-primary btn-lg" style="width: 50%;" value="Submit" onclick="registrasiMhs()"/><input type="reset" class="btn btn-default btn-lg" style="width: 50%;" value="Reset"/>
								</fieldset>
							</form>
						</div>
					</div>
				</div><!-- /.col-->
			</div><!-- /.row -->';
	}
	public function footer(){
		echo '<div id="dynamic"></div>
			<script src="libs/js/jquery-1.11.1.min.js"></script>
			<script src="libs/js/bootstrap.min.js"></script>
			<script src="libs/js/custom.js"></script>
			<script src="libs/js/cnfrmcstm/cnfrmcstm.js"></script>
			</body>

		</html>	';
	}
}
?>