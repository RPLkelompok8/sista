<?php
class mypanelmahasiswa extends mypanel{
	public static $navigasi1="";
	public static $navigasi2="";
	public static $navigasi3="";
	public static $navigasi4="";
	public static $currentpanel="";//diakses child
	
	public static $logopanelTA1;
	public static $logosidangTA;
	
	public static $uploadedta;
	public static $finalsession;
	public static $reqfinalsession;
	
	private $confview;
	private $confmodel;
	
	public static $judulTA;
	public static $tglpostingTA;
	public static $idkategoriTA;
	public static $kategoriTA;
	
	function __construct() {
		$modelmypanel=parent::$route.$_SESSION['sista_jenis_user'].'query';
		require_once 'models/'.$modelmypanel.".php";
		$this->confmodel = new $modelmypanel();
		if(isset($_GET['action'])){$action=$_GET['action'];} else{$action="dashboard";}
		$this->{$action}();		
	}	
	public function prepareview(){	
		//check oploaded TA
		$this->confmodel->checkuploadedta();
		if($this->confmodel->checkuploadedta()==0){//TA sudah terupload atau belum
			self::$logopanelTA1='glyphicon-floppy-open';
			self::$uploadedta=0;
		}
		else{
			self::$logopanelTA1='glyphicon-floppy-saved';
			self::$uploadedta=1;
		}
		//check final session
		$this->confmodel->checkfinalsession();
		if($this->confmodel->checkfinalsession()==0){//TA sudah terupload atau belum
			self::$logosidangTA='glyphicon-remove';
			self::$finalsession=0;
		}
		else{
			self::$logosidangTA='glyphicon-ok';
			self::$finalsession=1;
		}
		
		$viewmypanel=parent::$route.$_SESSION['sista_jenis_user'].'page';
		require_once 'views/'.$viewmypanel.'.php';
		$this->confview= new $viewmypanel();
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
		if(self::$uploadedta==0){$logostatusTA='glyphicon-floppy-remove';$statusTA="Kosong";}
		else{$logostatusTA='glyphicon-floppy-saved';$statusTA="Tersimpan";}
		
		if(self::$finalsession==0){$logosidangTA='glyphicon-remove';$statussidangTA="Belum";}
		else{$logosidangTA='glyphicon-ok';$statussidangTA="Sudah";}
		
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentdashboard($logostatusTA,$statusTA, $logosidangTA,$statussidangTA);
		$this->confview->footer();
	}
	public function sidangTA(){
		self::$navigasi3='class="active"';
		self::$currentpanel='Sidang Tugas Akhir';
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentsidangTA();
		$this->confview->footer();
	}
	public function ubahpassword(){
		if(isset($_GET['error'])){$pesan=$_GET['error']."</br></br>";}
		else{$pesan="";}
		self::$navigasi4='class="active"';
		self::$currentpanel='Ubah Password';
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentubahpassword($pesan);
		$this->confview->footer();
	}
	public function rubahPasswordAction(){
		$this->confmodel->rubahpassword();
	}
	public function EditTA(){
		self::$navigasi2='class="active"';
		self::$currentpanel='Panel Tugas Akhir';
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentEditTA($this->confmodel->EditTAAct());
		$this->confview->footer();
	}
}
?>