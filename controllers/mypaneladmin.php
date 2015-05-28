<?php
class mypaneladmin extends mypanel{
	public static $navigasi1="";
	public static $navigasi2="";
	public static $navigasi3="";
	public static $navigasi4="";
	public static $navigasi5="";
	public static $navigasi6="";
	public static $navigasi7="";
	public static $navigasi8="";
	public static $currentpanel="";//diakses child
	
	private $confview;
	private $confmodel;
	
	public static $isitabel="";
	public static $controlhalaman="";
	
	function __construct() {
		$modelmypanel=parent::$route.$_SESSION['sista_jenis_user'].'query';
		require 'models/'.$modelmypanel.".php";
		$this->confmodel = new $modelmypanel();
		if(isset($_GET['action'])){$action=$_GET['action'];} else{$action="dashboard";}
		$this->{$action}();		
	}	
	public function prepareview(){	
		$viewmypanel=parent::$route.$_SESSION['sista_jenis_user'].'page';
		require 'views/'.$viewmypanel.'.php';
		$this->confview= new $viewmypanel();
	}
	public function dashboard(){
		self::$navigasi1='active';
		self::$currentpanel='Dashboard';
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentdashboard();
		$this->confview->footer();
	}
	public function lihatregistrasimhs(){
		self::$navigasi2='active';
		self::$currentpanel='Rekap Pendaftaran Mahasiswa';
		$this->confmodel->listpendaftaran();
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentlihatregistrasimhs();
		$this->confview->footer();
	}
	public function controlakunmhs(){
		self::$navigasi3='active';
		self::$currentpanel='Control Akun Mahasiswa';
		$this->confmodel->listakunmhs();
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentcontrolakunmhs();
		$this->confview->footer();
	}
	public function ubahpassword(){
		if(isset($_GET['error'])){$pesan=$_GET['error']."</br></br>";}
		else{$pesan="";}
		self::$navigasi4='active';
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
	public function controlfileta(){
		self::$navigasi5='active';
		self::$currentpanel='Control File Tugas Akhir';
		$this->confmodel->listfileta();
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentcontrolfileta();
		$this->confview->footer();
	}
	public function backUpRegitrasiMhs(){
		self::$navigasi6='active';
		self::$currentpanel='Control Back Up Pendaftaran Mahasiswa';
		$pesan="";
		if(isset($_POST['submitbackup'])){
				$this->confmodel->backUpRegitrasiMhs();
				$pesan="Pendaftaran Sudah di-back up";
		}
		$this->prepareview();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentbackUpRegitrasiMhs($pesan);
		$this->confview->footer();
	}
	public function kategoriTA(){
		self::$navigasi7='active';
		self::$currentpanel='Kategori Tugas Akhir';
		$this->prepareview();
		if (isset($_POST['submit'])){
			$this->confmodel->isikategoriTA();
		}
		$this->confmodel->listkategoriTA();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentkategoriTA();
		$this->confview->footer();
	}
	public function EditKategoriTA(){
		self::$navigasi7='active';
		self::$currentpanel='Kategori Tugas Akhir';
		$this->prepareview();
		//if (isset($_POST['submit'])){}
		$this->confmodel->listkategoriTA();
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentUbahKategoriTA($this->confmodel->cariUpdateKategoriTA());
		$this->confview->footer();
	}
	public function UpdateKategoriTA(){
		$this->confmodel->updatekategoriTAAct();
	}
	public function restorePendaftaran(){
		self::$navigasi8='active';
		self::$currentpanel='Kategori Tugas Akhir';
		$this->prepareview();
		$pesan="";
		if (isset($_POST['submit'])){$this->confmodel->restorePendaftaranMhs();$pesan="Back Up SUKSES.!";}
		$this->confview->header();
		$this->confview->body();
		$this->confview->contentrestore($pesan);
		$this->confview->footer();
	}
}
?>