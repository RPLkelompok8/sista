<?php
class indexpage extends index{
	function __construct() {
	}
	public function header(){
		echo '<!DOCTYPE HTML>
			<html lang="en">
				<head>
					<!--=============== basic  ===============-->
					<meta charset="UTF-8">
					<title>Sistem Informasi Tugas Akhir</title>
					<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
					<meta name="robots" content="index, follow"/>
					<meta name="keywords" content=""/>
					<meta name="description" content=""/>
					<!--=============== css  ===============-->	
					<link rel="stylesheet" type="text/css" href="libs_2/css/font-awesome.min.css">
					<link type="text/css" rel="stylesheet" href="libs_2/css/reset.css">
					<link type="text/css" rel="stylesheet" href="libs_2/css/style.css">
					
					<link href="http://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css">
					<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
					<!--=============== favicons ===============-->
					<link rel="shortcut icon" href="images/sistalogo.png">	
				</head>
				<body>';
	}
	public function body(){
		echo '<!--================= main start ================-->
			<div id="main">
				<div class="header">
					<div style="background-image: url(\'libs_2/images/sistabanner.png\');" class="bg-parallax"></div>
					<div class="overlay"></div>
					<div class="container">		 
						<a href="?route=login"><img src="libs_2/images/login.png" class="logo" alt=""></a>
						<p>Sistem Informasi Tugas AKhir</p>
						<div class="separator-holder">
							<div class="separator"></div>
						</div>
					</div>				
				</div>

				<div class="content">
					<div class="box graybox">
						<div class="container">
							<div class="grid-full datagrid">
								<table>
									<thead>
										<tr>
											<th></th>
											<th>BP</th>
											<th>Nama</th>
											<th>Judul</th>
											<th>Abstrak</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										'.parent::$isitabel.'
									</tbody>
								</table>
							</div>
							</br>
							'.parent::$controlhalaman.'
						</div>
					</div>					
				</div>			
				<div class="height-emulator"></div>	
				<div class="footer"><div class="to-top-box"><a href="#main" class="scroll-btn transition" ><i class="fa fa-angle-up"></i></a></div></div>
				
			</div>';
	}
	public function footer(){
		echo '        <!-- Main end -->
					<script type="text/javascript" src="libs_2/js/jquery.min.js"></script>
					<script type="text/javascript" src="libs_2/js/scripts.js"></script>
				</body>
			</html>';
	}
	
}

?>