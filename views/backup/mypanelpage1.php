<?php
class mypanelpage extends mypanel{	
	function __construct() {		
	}	
	public $nameloggedin="";
	public function header(){
		echo '<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Information System Final Task</title>

		<link href="libs/css/bootstrap.min.css" rel="stylesheet">
		<link href="libs/css/datepicker3.css" rel="stylesheet">
		<link href="libs/css/styles.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">

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
					<a class="navbar-brand" href="#"><span>Information System</span> Final Task</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown">
						<h4><span class="glyphicon glyphicon-user"></span> '.$this->nameloggedin.'</h4>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-envelope"></i>  <span class="label label-danger">2</span>
							</a>
							<ul class="dropdown-menu dropdown-messages">
								<li>
									<div class="dropdown-messages-box">
										<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="http://placehold.it/40/ccc/fff">
										</a>
										<div class="message-body">
											<small class="pull-right">3 mins ago</small>
											<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
											<br />
											<small class="text-muted">1:24 pm - 25/03/2015</small>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="dropdown-messages-box">
										<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="http://placehold.it/40/ccc/fff">
										</a>
										<div class="message-body">
											<small class="pull-right">1 hour ago</small>
											<a href="#">New message from <strong>Jane Doe</strong>.</a>
											<br />
											<small class="text-muted">12:27 pm - 25/03/2015</small>
										</div>
									</div>
								</li>
								<li class="divider"></li>
							
								<li>
									<div class="all-button">
										<a href="#">
											<em class="glyphicon glyphicon-inbox"></em> <strong>All Messages</strong>
										</a>
									</div>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="glyphicon glyphicon-bell"></i>  <span class="label label-primary">18</span>
							</a>
							<ul class="dropdown-menu dropdown-alerts">
								<li>
									<a href="#">
										<div>
											<em class="glyphicon glyphicon-envelope"></em> 1 New Message
											<span class="pull-right text-muted small">3 mins ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">
										<div>
											<em class="glyphicon glyphicon-heart"></em> 12 New Likes
											<span class="pull-right text-muted small">4 mins ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">
										<div>
											<em class="glyphicon glyphicon-user"></em> 5 New Followers
											<span class="pull-right text-muted small">4 mins ago</span>
										</div>
									</a>
								</li>
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
				<li '.parent::$navigasi1.'><a href="index.php?route=mypanel"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
				<li '.parent::$navigasi2.'><a href="?route=mypanel&action=paneltugasakhir"><span class="glyphicon glyphicon-floppy-open"></span> Berkas Tugas Akhir</a></li>
				<li '.parent::$navigasi3.'><a href="?route=mypanel&action=uploadTA1"><span class="glyphicon glyphicon-floppy-open"></span>Upload Tugas Akhir I</a></li>				
				<li><a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span> Tables</a></li>
				<li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> Forms</a></li>
				<li><a href="buttons.html"><span class="glyphicon glyphicon-hand-up"></span> Buttons</a></li>
				<li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> Alerts &amp; Panels</a></li>
				<li class="parent ">
					<a href="#">
						<span class="glyphicon glyphicon-list"></span> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li>
							<a class="" href="#">
								<span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
							</a>
						</li>
						<li>
							<a class="" href="#">
								<span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
							</a>
						</li>
						<li>
							<a class="" href="#">
								<span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
							</a>
						</li>
					</ul>
				</li>
				<li role="presentation" class="divider"></li>
				<li><a href="?route=logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
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
		echo '<script src="libs/js/jquery-1.11.1.min.js"></script>
			<script src="libs/js/bootstrap.min.js"></script>
			<script src="libs/js/bootstrap-datepicker.js"></script>
			<script src="libs/js/custom.js"></script>
			<script>
			</script>
		</body>

		</html>';
	}
	
	public function dashboard(){
	echo '<div class="row col-no-gutter-container">
				<div class="col-xs-12 col-md-6 col-lg-3 col-no-gutter">
					<div class="panel panel-blue panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<em class="glyphicon glyphicon-remove glyphicon-l"></em>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">Unverified</div>
								<div class="text-muted">Account</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3 col-no-gutter">
					<div class="panel panel-orange panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<em class="glyphicon glyphicon-floppy-remove glyphicon-l"></em>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">No File</div>
								<div class="text-muted">Tugas Akhir I</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3 col-no-gutter">
					<div class="panel panel-teal panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<em class="glyphicon glyphicon-floppy-remove glyphicon-l"></em>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">No File</div>
								<div class="text-muted">Tugas Akhir II</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3 col-no-gutter">
					<div class="panel panel-red panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<em class="glyphicon glyphicon-stats glyphicon-l"></em>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">25.2k</div>
								<div class="text-muted">Visitors</div>
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
	
	public function TugasAkhirI(){
	echo '<div class="row col-no-gutter-container row-margin-top">
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
	
	public function PanelTugasAkhir(){
	echo '<div class="row col-no-gutter-container row-margin-top">
				<div class="col-lg-12 col-no-gutter">
					<div class="panel panel-default">
						<div class="panel-heading">Control Tugas Akhir</div>
						<div class="panel-body" id="body_panel_TA">
							<div class="col-md-6" id="idform">
							<form role="form" enctype="multipart/form-data" method="post">							
								<div class="form-group">
									<label>Judul Tugas Akhir</label>
									<input type="text" class="form-control" placeholder="Judul Tugas Akhir" id="fieldjudulTA">
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control" id="fieldkategoriTA">
										'.parent::$kategorita.'
									</select>
								</div>						
								<div class="form-group">
									<label>Berkas</label>
									<div id=divinputfileTA>
										<input type="file" name="fileTA" id="fileTA"">
									</div>
									 <p class="help-block" id="loaded_n_total">File harus ber-format ".pdf"</p>
									 <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
									 <h3 id="status"></h3>
								</div>
								
								<div class="form-group">
									<label>Abstrak</label>
									<textarea class="form-control" rows="3" id="fieldabstrakTA"></textarea>
								</div>
								<button type="button" class="btn btn-primary btn-outline">btn Unggah</button>
								<input type="button" value="inptbtn Unggah" onclick="uploadTA()" class="btn btn-primary btn-outline">
							</form>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		</div>	<!--/.main-->';
	}
}
?>