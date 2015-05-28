<?php
class mypaneladminpage extends mypaneladmin{	
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
		<title>Sista Admin</title>

		<link href="libs/css/bootstrap.min.css" rel="stylesheet">
		<link href="libs/css/datepicker3.css" rel="stylesheet">
		<link href="libs/css/stylesadmin.css" rel="stylesheet">
			
		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/x-icon" href="images/sistalogo.jpg" />
		<!--[if lt IE 9]>
		<link href="libs/css/rgba-fallback.css" rel="stylesheet">
		<script src="libs/js/html5shiv.js"></script>
		<script src="libs/js/respond.min.js"></script>
		<![endif]-->
		<link href="libs/js/cnfrmcstm/cnfrmcstm.css" rel="stylesheet">	
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
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-book"></i>  <span class="label label-danger" id="JmlhTABlmDlht"></span>
							</a>
							<ul class="dropdown-menu dropdown-messages" style="height:auto;max-height:200px;overflow-y:auto;" id="TABlmDlht">			
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-paperclip"></i>  <span class="label label-primary" id="JmlhRegMhsBlmDlht"></span>
							</a>
							<ul class="dropdown-menu dropdown-messages" style="height:auto;max-height:200px;overflow-y:auto;" id="RegMhsBlmDlht">
							</ul>
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
				<li class="'.parent::$navigasi1.'"><a href="index.php?route=mypanel"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
				<li class="'.parent::$navigasi2.'"><a href="index.php?route=mypanel&action=lihatregistrasimhs"><span class="glyphicon glyphicon-paperclip"></span> Pendaftaran Mahasiswa</a></li>
				<li class="'.parent::$navigasi3.'"><a href="index.php?route=mypanel&action=controlakunmhs"><span class="glyphicon glyphicon-user"></span> Akun Mahasiswa</a></li>
				<li class="'.parent::$navigasi5.'"><a href="?route=mypanel&action=controlfileta"><span class="glyphicon glyphicon-book"></span> Berkas Tugas Akhir</a></li>
				<li class="'.parent::$navigasi7.'"><a href="?route=mypanel&action=kategoriTA"><span class="glyphicon glyphicon-hdd"></span> Kategori Tugas Akhir</a></li>	
				<li class="parent '.parent::$navigasi6.'">
					<a href="#">
						<span class="glyphicon glyphicon-compressed"></span> Back UP Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li>
							<a class="" href="index.php?route=mypanel&action=backUpRegitrasiMhs">
								<span class="glyphicon glyphicon-share-alt"></span> Pendaftaran Mahasiswa
							</a>
						</li>
					</ul>
				</li>
				<li class="'.parent::$navigasi8.'"><a href="?route=mypanel&action=restorePendaftaran"><span class="glyphicon glyphicon-compressed"></span> Restore Pendaftaran MHS</a></li>	
				<li class="'.parent::$navigasi4.'"><a href="index.php?route=mypanel&action=ubahpassword"><span class="glyphicon glyphicon-wrench"></span> Ubah Password</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href="?route=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div><!--/.sidebar-->
			
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div id="subpanel"></div>
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
		echo '<div id="dynamic1" class="modal fade" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<p>ini dia modalnya</p>
						</div>	
					</div>	
				</div>				
			</div>
			<div id="dynamic"></div>
			<script src="libs/js/jquery-1.11.1.min.js"></script>
			<script src="libs/js/bootstrap.min.js"></script>
			<script src="libs/js/bootstrap-datepicker.js"></script>
			<script src="libs/js/bootstrap-table.js"></script>
			<script src="libs/js/custom.js"></script>
			<script src="libs/js/cnfrmcstm/cnfrmcstm.js"></script>
			
			<script>
			</script>
		</body>
		</html>';
	}
	
	public function contentdashboard(){
	echo '	<div class="row col-no-gutter-container row-margin-top">
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
	public function contentlihatregistrasimhs(){
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		echo '<div class="row col-no-gutter-container row-margin-top">
					<div class="col-lg-12 col-no-gutter">
						<div class="panel panel-default">
							<div class="panel-heading">Pendaftaran Mahasiswa</div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<table data-toggle="table" data-url="libs/tables/data.json">
										<thead>
										<tr>
											<th>No</th>
											<th>BP</th>
											<th>Nama Lengkap</th>
											<th>Detail</th>
											<th>Aktifkan</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										'.parent::$isitabel.'
										</tbody>
									</table>
									</br>
									'.parent::$controlhalaman.'
								</div>
							</div>
						</div>
					</div>
				</div><!--/.row-->	
			</div>	<!--/.main-->';
	}
	public function contentcontrolakunmhs(){
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		echo '<div class="row col-no-gutter-container row-margin-top">
					<div class="col-lg-12 col-no-gutter">
						<div class="panel panel-default">
							<div class="panel-heading">Akun Mahasiswa</div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<table data-toggle="table" data-url="libs/tables/data.json">
										<thead>
										<tr>
											<th>No</th>
											<th>BP</th>
											<th>Nama Lengkap</th>
											<th>Password</th>
											<th>email</th>
											<th>status</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										'.parent::$isitabel.'
										</tbody>
									</table>
									</br>
									'.parent::$controlhalaman.'
								</div>
							</div>
						</div>
					</div>
				</div><!--/.row-->	
			</div>	<!--/.main-->';
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
	public function contentcontrolfileta(){
		echo '<div class="row col-no-gutter-container row-margin-top">
						<div class="col-lg-12 col-no-gutter">
							<div class="panel panel-default">
								<div class="panel-heading">Control Tugas Akhir</div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<table data-toggle="table" data-url="libs/tables/data.json">
											<thead>
											<tr>
												<th>No</th>
												<th>BP</th>
												<th>Nama Lengkap</th>
												<th>Judul TA</th>
												<th>Tanggal</th>
												<th>Detail</th>
												<th>Status</th>
												<th></th>
											</tr>
											</thead>
											<tbody>
											'.parent::$isitabel.'
											</tbody>
										</table>
										</br>
										'.parent::$controlhalaman.'
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->	
				</div>	<!--/.main-->';		
	}
	public function contentbackUpRegitrasiMhs($pesan){
		echo '<div class="row col-no-gutter-container row-margin-top">
						<div class="col-lg-12 col-no-gutter">
							<div class="panel panel-default">
								<div class="panel-heading">Back Up Pendaftaran Mahasiswa</div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<form method="post" action="">
											'.$pesan.'
											<input type="submit" value="backup" name="submitbackup"class="btn btn-primary" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->	
				</div>	<!--/.main-->';	
	}
	public function contentkategoriTA(){
		echo '<div class="row col-no-gutter-container row-margin-top">
						<div class="col-lg-12 col-no-gutter">
							<div class="panel panel-default">
								<div class="panel-heading">Pengaturan Kategori Tugas Akhir</div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<div class="col-md-12">
											<form role="form" method="post" action="">							
												<div class="form-group" id="divfieldjudulTA">
													<label>Kategori TA</label>
													<input type="text" class="form-control" placeholder="Kategori TA" id="fieldjudulTA" maxlength="200" name="kategoriTA">
												</div>
												<input type="submit" name="submit" value="Tambah" class="btn btn-primary"/>
												<input type="reset" value="Reset" class="btn btn-default"/>
											</form></br></br>
											<table data-toggle="table" data-url="libs/tables/data.json">
												<thead>
												<tr>
													<th>No</th>
													<th>Kategori Tugas Akhir</th>
													<th></th>
													<th></th>
												</thead>
												<tbody>
												'.parent::$isitabel.'
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->	
				</div>	<!--/.main-->';	
	}
	public function contentUbahKategoriTA($pesan){
		echo '<div class="row col-no-gutter-container row-margin-top">
						<div class="col-lg-12 col-no-gutter">
							<div class="panel panel-default">
								<div class="panel-heading">Pengaturan Kategori Tugas Akhir</div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<div class="col-md-12">
										'.$pesan.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->	
				</div>	<!--/.main-->';	
	}
	public function contentrestore($pesan){
		echo '<div class="row col-no-gutter-container row-margin-top">
						<div class="col-lg-12 col-no-gutter">
							<div class="panel panel-default">
								<div class="panel-heading">Restore Pendaftaran Mahasiswa</div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<div class="col-md-12">'.$pesan.'
											<form role="form" method="post" action="" enctype="multipart/form-data">							
												<div class="form-group">
													<label>Pilih File</label>
													<div id="divinputfileRestoreRegMhs"><input type="file" name="fileRestoreRegMhs" id="fileRestoreRegMhs" /></div>
												</div>
												<input type="submit" name="submit" value="Restore" class="btn btn-primary"/>
												<input type="reset" value="Reset" class="btn btn-default"/>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->	
				</div>	<!--/.main-->';	
	}
}
?>
