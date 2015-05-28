<?php
class mypanelmahasiswapage extends mypanelmahasiswa{	
	public $selectionkategoriTA;	
	//public $kategoriTA;
	function __construct() {		
	}
	public function header(){
		echo '<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sista My Panel</title>

		<link href="libs/css/bootstrap.min.css" rel="stylesheet">
		<link href="libs/css/datepicker3.css" rel="stylesheet">
		<link href="libs/css/styles.css" rel="stylesheet">
		<link href="libs/js/cnfrmcstm/cnfrmcstm.css" rel="stylesheet">
			
		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/x-icon" href="images/sistalogo.jpg" />
		<!--[if lt IE 9]>
		<link href="libs/css/rgba-fallback.css" rel="stylesheet">
		<script src="libs/js/html5shiv.js"></script>
		<script src="libs/js/respond.min.js"></script>
		<![endif]-->			
		</head>
		<body>';
	}
	public function body(){
		echo '
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><span>Sistem Informasi</span> Tugas Akhir</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown">
						<h4><span class="glyphicon glyphicon-user"></span> '.$_SESSION['sista_name'].'</h4>
						</li>
					</ul>
				</div>
			</div><!-- /.container-fluid -->
		</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<form role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
			</form>
			<ul class="nav menu">
				<li '.parent::$navigasi1.'><a href="index.php?route=mypanel"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
				<li '.parent::$navigasi2.'><a href="?route=mypanel&action=paneltugasakhir"><span class="glyphicon '.parent::$logopanelTA1.'"></span> Berkas Tugas Akhir</a></li>
				<li '.parent::$navigasi4.'><a href="index.php?route=mypanel&action=ubahpassword"><span class="glyphicon glyphicon-wrench"></span> Ubah Password</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href="?route=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div><!--/.sidebar-->
			
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
					<li class="active">'.parent::$currentpanel.'</li>
				</ol>
			</div><!--/.row-->
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">'.parent::$currentpanel.'</h1>
				</div>
			</div><!--/.row-->
			';
	}
	public function footer(){
		echo '<div id="dynamic"></div>
			<script src="libs/js/jquery-1.11.1.min.js"></script>
			<script src="libs/js/bootstrap.min.js"></script>
			<script src="libs/js/bootstrap-datepicker.js"></script>
			<script src="libs/js/custom.js"></script>
			<script src="libs/js/cnfrmcstm/cnfrmcstm.js"></script>
			<script>
			</script>
		</body>
		</html>';
	}
	
	public function contentdashboard($logostatusTA,$statusTA, $logosidangTA,$statussidangTA){
	echo '<div class="row col-no-gutter-container">				
				<div class="col-xs-12 col-md-6 col-lg-3 col-no-gutter">
					<div class="panel panel-orange panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<em class="glyphicon '.$logostatusTA.' glyphicon-l"></em>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">'.$statusTA.'</div>
								<div class="text-muted">Tugas Akhir</div>
							</div>
						</div>
					</div>
				</div>				
			</div><!--/.row-->			
			<div class="row col-no-gutter-container row-margin-top">
				<div class="col-lg-12 col-no-gutter">
					<div class="panel panel-default">
						<div class="panel-heading">Site Traffic Overview</div>
						<div class="panel-body">
							<div class="canvas-wrapper">
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		</div>	<!--/.main-->';
	}
	
	public function contentsidangTA(){
	$isi='';
	if (parent::$finalsession==0){
		$isi='	<div class="alert bg-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign"></span> Anda belum Melakukan sidang tugas akhir, dan belum dapat mengunggah Tugas Akhir anda.
				</div>';
				
		if(parent::$reqfinalsession==0){
			$isi.='<button class="btn btn-default margin" type="button" onclick="open_box(\'Anda yakin akan me-reservasi sidang TA?\',\'mintasidangTA\',\''.$_SESSION['sista_id'].'\')"><span class="glyphicon glyphicon-hand-up"></span>
					&nbsp;Lakukan Permintaan Sidang Tugas Akhir</button>';
		}
		else{
			$isi.='<div class="alert bg-success" role="alert">
					<span class="glyphicon glyphicon-check"></span> Permintaan sidang TA sudah dikirim ke Adm jurusan. Silahkan tunggu konfirmasi dari sistem.
				</div>
			';
		}
	}
	echo '<div class="row col-no-gutter-container row-margin-top">
				<div class="col-lg-12 col-no-gutter">
					<div class="panel panel-default">
						<div class="panel-heading">Sidang Tugas Akhir</div>
						<div class="panel-body">
							<div class="canvas-wrapper">
							'.$isi.'
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		</div>	<!--/.main-->';
	}
	
	public function contentpaneltugasakhir(){
	$isi= '<div class="row col-no-gutter-container row-margin-top">
				<div class="col-lg-12 col-no-gutter">
					<div class="panel panel-default">
						<div class="panel-heading">Control Tugas Akhir</div>
						<div class="panel-body" id="body_panel_TA">
							<div class="col-md-8" id="idform">';
		if(parent::$uploadedta==0){
			$isi.='
							<form role="form" enctype="multipart/form-data" method="post">							
								<div class="form-group" id="divfieldjudulTA">
									<label>Judul Tugas Akhir</label>
									<input type="text" class="form-control" placeholder="Judul Tugas Akhir" id="fieldjudulTA" maxlength="200">
								</div>
								<div class="form-group" id="divfieldkategoriTA">
									<label>Kategori</label>
									<select class="form-control" id="fieldkategoriTA">
										'.$this->selectionkategoriTA.'
									</select>
								</div>														
								<div class="form-group" id="divfieldabstrakTA">
									<label>Abstrak</label>
									<textarea class="form-control" rows="4" id="fieldabstrakTA" maxlength="10000"></textarea>
								</div>
								<div class="form-group" id="divgroupinputfileTA">
									<label>Berkas Tugas Akhir</label>
									<div id="divinputfileTA"><input type="file" name="fileTA" id="fileTA" onchange="checkfile(\'divinputfileTA\', \'fileTA\', \'10240000\', \'pdf\')" required/></div>
									<p class="help-block">File harus ber-format ".pdf" & max size 10Mb</p>
								</div>
								<div class="form-group" id="divgroupinputfileBeritaSeminar">
									<label>Bukti Berita Acara Seminar Tugas Akhir</label>
									<div id="divinputfileBeritaSeminar"><input type="file" name="fileBeritaSeminar" id="fileBeritaSeminar" onchange="checkfile(\'divinputfileBeritaSeminar\', \'fileBeritaSeminar\', \'3072000\', \'\')" required/></div>
									<p class="help-block">max size 3Mb</p>
								</div>
								<div class="form-group" id="divgroupinputfileBeritaSidang">
									<label>Bukti Berita Acara Sidang Tugas Akhir</label>
									<div id="divinputfileBeritaSidang"><input type="file" name="fileBeritaSidang" id="fileBeritaSidang" onchange="checkfile(\'divinputfileBeritaSidang\', \'fileBeritaSidang\', \'3072000\', \'\')" required/></div>
									<p class="help-block">max size 3Mb</p>
								</div>
								<input type="button" value="Unggah" onclick="uploadTA()" class="btn btn-primary">
								<input type="reset" value="Reset" class="btn btn-default">
							</form>';
		}
		else{
			$isi.='
							<div class="alert bg-success" role="alert">
								<span class="glyphicon glyphicon-check"></span> Tugas Akhir Anda Sudah Diunggah.
							</div>
							<table style="width:100%; cursor:default">
							<tbody>
							  <tr>
								<td><h4>Judul Tugas AKhir</h4></td>
								<td>'.parent::$judulTA.'</td>		
							  </tr>
							  <tr>
								<td><h4>Tanggal Posting</h4></td>
								<td>'.parent::$tglpostingTA.'</td>		
							  </tr>
							  <tr>
								<td><h4>Kategori Tugas Akhir</h4></td>
								<td>'.parent::$kategoriTA.'</td>		
							  </tr>
							</tbody>
							</table></br>
							<button class="btn btn-default margin" type="button" onclick="open_box(\'Apakah anda yakin menghapus tugas akhir ini?\',\'hapusTAmahasiswa\',\''.$_SESSION['sista_id'].'\')"><span class="glyphicon glyphicon-trash"></span> &nbsp;Hapus</button>
							<a class="btn btn-default margin" href="?route=mypanel&action=EditTA"><span class="glyphicon glyphicon-edit"></span> &nbsp;Ubah</a>';
		}							
							$isi.='</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		</div>	<!--/.main-->';
		echo $isi;
	}
	public function contentubahpassword($pesan){
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		echo '<div class="row col-no-gutter-container row-margin-top">
					<div class="col-lg-12 col-no-gutter">
						<div class="panel panel-default">
							<div class="panel-heading">Rubah Password Masuk Akun</div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<div class="row">
										<div class="col-md-6">
											'.$pesan.'
											<form role="form" method="post" action="?route=mypanel&action=rubahPasswordAction">							
												<div class="form-group">
													<label>Password Sekarang</label>
													<input name="passlama" type="password" class="form-control" placeholder="Password Sekarang">
												</div>						
												<div class="form-group">
													<label>Password Baru</label>
													<input name="passbaru" type="password" class="form-control" placeholder="Password Baru">
												</div>
												<div class="form-group">
													<label>Ketik Ulang Password Baru</label>
													<input name="repassbaru" type="password" class="form-control" placeholder="Ketik Ulang Password Baru">
												</div>
													<input type="submit" class="btn btn-primary margin" value="Rubah"/>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.row-->	
			</div>	<!--/.main-->';
	}
	public function contentEditTA($form){
		echo '<div class="row col-no-gutter-container row-margin-top">
				<div class="col-lg-12 col-no-gutter">
					<div class="panel panel-default">
						<div class="panel-heading">Edit Tugas Akhir</div>
						<div class="panel-body" id="body_panel_TA">
							<div class="col-md-8" id="idform">
							'.$form.'
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		</div>	<!--/.main-->';
	}
}
?>