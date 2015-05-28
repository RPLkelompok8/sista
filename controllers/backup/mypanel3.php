<?php
class mypanel extends router{
	public static $navigasi1="";
	public static $navigasi2="";
	public static $navigasi3="";
	public static $currentpanel="";//diakses child
	
	public static $uploadedta;
	public static $logopanelTA1;
	private $confview;
	private $confmodel;
	
	public static $judulTA;
	public static $tglpostingTA;
	public static $idkategoriTA;
	public static $kategoriTA;
	
	function __construct() {
		parent::$needlogin=true;
	}	
	public function initializing(){
		require 'models/'.parent::$route.$_SESSION['sista_jenis_user']."query.php";
		$this->confmodel = new mypanelquery();
		if(isset($_GET['action'])){$action=$_GET['action'];} else{$action="dashboard";}
		$this->{$action}();		
	}
	public function prepareview(){	
		$this->confmodel->checkuploadedta();
		if($this->confmodel->checkuploadedta()==0){//TA sudah terupload atau belum
			self::$logopanelTA1='glyphicon-floppy-open';
			self::$uploadedta=0;
		}
		else{
			self::$logopanelTA1='glyphicon-floppy-saved';
			self::$uploadedta=1;
		}
		require 'views/'.parent::$route.'page.php';
		$funcvar=parent::$route."page";
		$this->confview= new $funcvar();
		$this->confview->nameloggedin=$_SESSION['sista_name'];
	}
	public function paneltugasakhir(){
		self::$navigasi2='class="active"';
		self::$currentpanel='Panel Tugas Akhir';
		$this->prepareview();
		if(self::$uploadedta==0){$this->confview->selectionkategoriTA=$this->confmodel->getsemuakategorita();}
		else{
			$this->confmodel->carikategoriTA(self::$idkategoriTA);			
		}
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentpaneltugasakhir();
		$this->confview->footer();
	}
	public function dashboard(){
		self::$navigasi1='class="active"';
		self::$currentpanel='Dashboard';
		$this->prepareview();
		if(self::$uploadedta==0){$logostatusTA1='glyphicon-floppy-remove';}
		else{$logostatusTA1='glyphicon-floppy-saved';}
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentdashboard($logostatusTA1);
		$this->confview->footer();
	}
}
?>