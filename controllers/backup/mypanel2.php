<?php
class mypanel extends router{
	public static $navigasi1="";
	public static $navigasi2="";
	public static $navigasi3="";
	public static $currentpanel="";
	public static $kategorita;
	public static $uploadedta;
	public static $logopanelTA1;
	function __construct() {
		parent::$needlogin=true;
	}
	public function initializing(){
		require 'models/'.parent::$route."query.php";
		if(isset($_GET['action'])){$action=$_GET['action'];} else{$action="dashboard";}
		switch ($action) {
		case "uploadTA1":
			self::$navigasi3='class="active"';
			self::$currentpanel='Tugas Akhir I';
			break;			
		case "paneltugasakhir":
			self::$navigasi2='class="active"';
			self::$currentpanel='Panel Tugas Akhir';
			$conf = new mypanelquery();
			if($conf->checkuploadedta()==0){
				self::$logopanelTA1='glyphicon-floppy-open';
				self::$uploadedta=0;
				self::$kategorita=$conf->getkategorita();
			}
			else{
				self::$logopanelTA1='glyphicon-floppy-saved';
				self::$uploadedta=1;
			}						
			break;
		case "dashboard":
			self::$navigasi1='class="active"';
			self::$currentpanel='Dashboard';
			break;
		}
		$currentpaneltofunc=str_replace(" ","",self::$currentpanel);		
		require 'views/'.parent::$route.'page.php';
		$funcvar=parent::$route."page";
		$login= new $funcvar();
		$login->nameloggedin=$_SESSION['sista_name'];		
		$login->header();
		$login->body();
		$login->$currentpaneltofunc();
		$login->footer();
	}
}
?>