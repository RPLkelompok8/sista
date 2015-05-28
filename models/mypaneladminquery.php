<?php
class mypaneladminquery extends mypaneladmin{
	//public $dataRow = array();
	function __construct() {
	}
	public function listpendaftaran(){
		$isi="";$halaman="";	
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		$sql = "SELECT username FROM registrasimhs";
		$conf=new dbCenter("");
		$data=$conf->executeQuery($sql);
		if(false == $data) {
			//throw new Exception('Query failed with: ' . mysqli_error());
		} 
		else {}
		$row_count = count($data);
		$data=null;
		
		$items_per_page = 10;
		$page_count = 0;
		if (0 == $row_count) {} 
		else{	   
			$page_count = (int)ceil($row_count / $items_per_page);//ceil untuk pembulatan bilangan ke atas	   
			if($page > $page_count) {$page = 1;}
			$offset = ($page - 1) * $items_per_page;
			$sql = "SELECT * FROM registrasimhs ORDER BY username asc LIMIT " . $offset . "," . $items_per_page;
			$conf=new dbCenter("");
			$data=$conf->executeQuery($sql);
			if(count($data)>0)
			{$notabel=$offset+1;
				foreach ($data as $tara) 
				{
					$sql = "SELECT name FROM user where username='".$tara["username"]."'";
					$cariusername=new dbCenter("");
					$data1=$cariusername->executeQuery($sql);
					$nama=str_replace("[|*apstrf*|]","'", $data1[0]["name"]);
					if($tara['terverifikasi']==0){$aktifkan='<button id="setujubtn" class="btn btn-info" onclick="open_box(\'Yakin Setujui Pendaftaran Tugas Akhir '.$data1[0]["name"].' ?\',\'setujuiRegistrasiMhs\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-hand-up"></span> Setujui</button>';}
					else{$aktifkan='<button id="tlksetujubtn" class="btn btn-warning" onclick="open_box(\'Batalkan Persetujuan Penerimaan '.$data1[0]["name"].' ?\',\'batalSetujuRegistrasiMhs\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-remove"></span> Cabut Persetujuan</button>';}
					$isi.='<tr>
								<td>'.$notabel.'</td>
								<td>'.$tara["username"].'</td>
								<td>'.$nama.'</td>
								<td><a href="#" class="btn btn-info" onclick="detailPendaftaranMhs(\''.$tara["username"].'\', event)"><span class="glyphicon glyphicon-eye-open"> lihat</span></a></td>
								<td>'.$aktifkan.'</td>
								<td><button class="btn btn-danger" onclick="open_box(\'Yakin Hapus Pendaftaran '.$data1[0]["name"].' ?\',\'hapusPendaftaranRegistrasiMhs\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-trash"></span> Hapus</button></td>
							</tr>';	
					$notabel=$notabel+1;
				} 
			}	
			// for example
			function pagenolink($posisi)
			{
				return 'Page ' . $posisi . ',';
			}
			function pagelink($posisi)
			{
				return '<a href="?route=mypanel&action=lihatregistrasimhs&pages=' . $posisi . '">Page ' . $posisi . '</a>,';
			}
			if ($page_count>7)
			{
				$mentok=0;
				if($page>4)
				{
					$halaman.= '<a href="?route=mypanel&action=lihatregistrasimhs&pages=1"><<</a> ...';
					$finish=$page+3;
					if($finish>=$page_count)
					{
						$finish=$page_count;
						$mentok=1;
					}
					
						for ($i = $page-3; $i <= $finish; $i++) {
						   if ($i == $page) { // this is current page
							   $halaman.= pagenolink($i);
						   } 
							else { // show link to other page   
							   $halaman.=pagelink($i) ;
							}
						}
					if(($page<$page_count)&&($mentok==0))
					{
						$halaman.= '...';
					}
					if($page<$page_count)
					{
					 $halaman.='<a href="?route=mypanel&action=lihatregistrasimhs&pages='.$page_count.'">>></a>';
					}
				}
				else
				{
					for ($i = 1; $i <= 7; $i++) 
				   if ($i == $page) { // this is current page
					   $halaman.= pagenolink($i);
				   } 
					else { // show link to other page   
					   $halaman.= pagelink($i);
					}
					$halaman.= '...';
					$halaman.='<a href="?route=mypanel&action=lihatregistrasimhs&pages='.$page_count.'">>></a>';
				}
			}
			if ($page_count<=7)
			{
				for ($i = 1; $i <= $page_count; $i++) {
				   if ($i == $page){ // this is current page
					   $halaman.= pagenolink($i);
					} 
					else { // show link to other page   
					   $halaman.=pagelink($i) ;
					}
				}
			}
			parent::$isitabel=$isi;
			parent::$controlhalaman=$halaman;
		}
	}
	public function listakunmhs(){
		$isi="";$halaman="";	
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		$sql = "SELECT username FROM user where id_jenis_user='2'";
		$conf=new dbCenter("");
		$data=$conf->executeQuery($sql);
		if(false == $data) {
			//throw new Exception('Query failed with: ' . mysqli_error());
		} 
		else {}
		$row_count = count($data);
		$data=null;
		
		$items_per_page = 10;
		$page_count = 0;
		if (0 == $row_count) {} 
		else{	   
			$page_count = (int)ceil($row_count / $items_per_page);//ceil untuk pembulatan bilangan ke atas	   
			if($page > $page_count) {$page = 1;}
			$offset = ($page - 1) * $items_per_page;
			$sql = "SELECT * FROM user where id_jenis_user='2' ORDER BY username asc LIMIT " . $offset . "," . $items_per_page;
			$conf=new dbCenter("");
			$data=$conf->executeQuery($sql);
			if(count($data)>0)
			{$notabel=$offset+1;
				foreach ($data as $tara) 
				{
					$nama=str_replace("[|*apstrf*|]","'", $tara["name"]);
					if($tara['berlaku']==0){$status="non-aktif";
						$actionbtn='<button class="btn btn-info" onclick="open_box(\'Aktifkan Akun  '.$tara["name"].' ?\',\'aktifkanAkunMhs\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-hand-up"></span> Aktifkan</button>';
					}
					else{
						$status="aktif";
						$actionbtn='<button class="btn btn-warning" onclick="open_box(\'Non-Aktifkan Akun '.$tara["name"].' ?\',\'matikanAkunMhs\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-remove"></span> Matikan</button>';
					}
					$isi.='<tr>
								<td>'.$notabel.'</td>
								<td>'.$tara["username"].'</td>
								<td>'.$nama.'</td>
								<td>'.$tara["pass"].'</td>
								<td>'.$tara["email"].'</td>
								<td>'.$status.'</td>
								<td>'.$actionbtn.'</td>
							</tr>';	
					$notabel=$notabel+1;
				} 
			}	
			// for example
			function pagenolink($posisi)
			{
				return 'Page ' . $posisi . ',';
			}
			function pagelink($posisi)
			{
				return '<a href="?route=mypanel&action=controlakunmhs&pages=' . $posisi . '">Page ' . $posisi . '</a>,';
			}
			if ($page_count>7)
			{
				$mentok=0;
				if($page>4)
				{
					$halaman.= '<a href="?route=mypanel&action=controlakunmhs&pages=1"><<</a> ...';
					$finish=$page+3;
					if($finish>=$page_count)
					{
						$finish=$page_count;
						$mentok=1;
					}
					
						for ($i = $page-3; $i <= $finish; $i++) {
						   if ($i == $page) { // this is current page
							   $halaman.= pagenolink($i);
						   } 
							else { // show link to other page   
							   $halaman.=pagelink($i) ;
							}
						}
					if(($page<$page_count)&&($mentok==0))
					{
						$halaman.= '...';
					}
					if($page<$page_count)
					{
					 $halaman.='<a href="?route=mypanel&action=controlakunmhs&pages='.$page_count.'">>></a>';
					}
				}
				else
				{
					for ($i = 1; $i <= 7; $i++) 
				   if ($i == $page) { // this is current page
					   $halaman.= pagenolink($i);
				   } 
					else { // show link to other page   
					   $halaman.= pagelink($i);
					}
					$halaman.= '...';
					$halaman.='<a href="?route=mypanel&action=controlakunmhs&pages='.$page_count.'">>></a>';
				}
			}
			if ($page_count<=7)
			{
				for ($i = 1; $i <= $page_count; $i++) {
				   if ($i == $page){ // this is current page
					   $halaman.= pagenolink($i);
					} 
					else { // show link to other page   
					   $halaman.=pagelink($i) ;
					}
				}
			}
			parent::$isitabel=$isi;
			parent::$controlhalaman=$halaman;
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
						header("Location:?route=mypanel");
					}				
			}
		}
		else{
			header("Location:?route=mypanel&action=ubahpassword&error=Lengkapi semua field");
		}
	}
	public function listfileta(){
		$isi="";$halaman="";	
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		$sql = "SELECT username FROM ta2";
		$conf=new dbCenter("");
		$data=$conf->executeQuery($sql);
		if(false == $data) {
			//throw new Exception('Query failed with: ' . mysqli_error());
		} 
		else {}
		$row_count = count($data);
		$data=null;		
		$items_per_page = 10;
		$page_count = 0;
		if (0 == $row_count) {} 
		else{	   
			$page_count = (int)ceil($row_count / $items_per_page);//ceil untuk pembulatan bilangan ke atas	   
			if($page > $page_count) {$page = 1;}
			$offset = ($page - 1) * $items_per_page;
			$sql = "SELECT * FROM ta2 ORDER BY username asc LIMIT " . $offset . "," . $items_per_page;
			$conf=new dbCenter("");
			$data=$conf->executeQuery($sql);
			if(count($data)>0)
			{$notabel=$offset+1;
				foreach ($data as $tara){
					$sql = "SELECT name FROM user where username='".$tara["username"]."'";
					$cariname=new dbCenter("");
					$data1=$cariname->executeQuery($sql);
					$nama=str_replace("[|*apstrf*|]","'", $data1[0]["name"]);
					if($tara['ditampilkan']==0){$status="tidak_tampil";
						$actionbtn='<button class="btn btn-info" onclick="open_box(\'Aktifkan Tugas Akhir  '.$nama.' ?\',\'aktifkanFileTA\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-hand-up"></span> Tampilkan</button>';
					}
					else{
						$status="tampil";
						$actionbtn='<button class="btn btn-warning" onclick="open_box(\'Non-Aktifkan Tugas Akhir '.$nama.' ?\',\'matikanFileTA\',\''.$tara["username"].'\')"><span class="glyphicon glyphicon-remove"></span> Matikan</button>';
					}
					$isi.='<tr>
								<td>'.$notabel.'</td>
								<td>'.$tara["username"].'</td>
								<td>'.$nama.'</td>
								<td>'.$tara["judul"].'</td>
								<td>'.$tara["tanggal_posting"].' - '.$tara["bulan_posting"].' - '.$tara["tahun_posting"].'</td>
								<td><a href="#" class="btn btn-info" onclick="detailFileTA(\''.$tara["username"].'\', event)"><span class="glyphicon glyphicon-eye-open"> lihat</span></a></td>
								<td>'.$status.'</td>
								<td>'.$actionbtn.'</td>
							</tr>';	
					$notabel=$notabel+1;
				} 
			}	
			// for example
			function pagenolink($posisi)
			{
				return 'Page ' . $posisi . ',';
			}
			function pagelink($posisi)
			{
				return '<a href="?route=mypanel&action=controlfileta&pages=' . $posisi . '">Page ' . $posisi . '</a>,';
			}
			if ($page_count>7)
			{
				$mentok=0;
				if($page>4)
				{
					$halaman.= '<a href="?route=mypanel&action=controlfileta&pages=1"><<</a> ...';
					$finish=$page+3;
					if($finish>=$page_count)
					{
						$finish=$page_count;
						$mentok=1;
					}
					
						for ($i = $page-3; $i <= $finish; $i++) {
						   if ($i == $page) { // this is current page
							   $halaman.= pagenolink($i);
						   } 
							else { // show link to other page   
							   $halaman.=pagelink($i) ;
							}
						}
					if(($page<$page_count)&&($mentok==0))
					{
						$halaman.= '...';
					}
					if($page<$page_count)
					{
					 $halaman.='<a href="?route=mypanel&action=controlfileta&pages='.$page_count.'">>></a>';
					}
				}
				else
				{
					for ($i = 1; $i <= 7; $i++) 
				   if ($i == $page) { // this is current page
					   $halaman.= pagenolink($i);
					} 
					else { // show link to other page   
					   $halaman.= pagelink($i);
					}
					$halaman.= '...';
					$halaman.='<a href="?route=mypanel&action=controlfileta&pages='.$page_count.'">>></a>';
				}
			}
			if ($page_count<=7)
			{
				for ($i = 1; $i <= $page_count; $i++) {
				   if ($i == $page){ // this is current page
					   $halaman.= pagenolink($i);
					} 
					else { // show link to other page   
					   $halaman.=pagelink($i) ;
					}
				}
			}
			parent::$isitabel=$isi;
			parent::$controlhalaman=$halaman;			
		}
	}
	public function ygBelumDilihat(){
		$sql = "SELECT username,dilihat FROM ta2 where dilihat='0'";
		$cariname=new dbCenter("");
		$data1=$cariname->executeQuery($sql);
		parent::$JmlhBlmDlht=count($data1);
		$isi='';
		foreach ($data1 as $tara){
			$sql = "SELECT name FROM user where username='".$tara["username"]."'";
			$cariusername=new dbCenter("");
			$data1=$cariusername->executeQuery($sql);
			$nama=str_replace("[|*apstrf*|]","'", $data1[0]["name"]);
			$isi.='<li>
					<div class="dropdown-messages-box">
						<a href="profile.html" class="pull-left">
							<span class="glyphicon glyphicon-check glyphicon-l"></span>
						</a>
						<div class="message-body">
							<small class="pull-right"></small>
								<a href="#" onclick="detailFileTA(\''.$tara["username"].'\')"><strong>'.$nama.'</strong> Mencoba Memposting <strong>Tugas Akhir</strong>.</a>
							<br/>
							<small class="text-muted">1:24 pm - 25/03/2015</small>
						</div>
					</div>
				</li>
				<li class="divider"></li>';			
		}
		parent::$BlmDlht=$isi;		
	}
	public function backUpRegitrasiMhs(){
		
		/* backup the db OR just a table */
		//function backup_tables($host,$user,$pass,$name,$tables = '*')
		function backup_tables($host,$user,$pass,$name,$tables)
		{
			
			$link = mysql_connect($host,$user,$pass);
			mysql_select_db($name,$link);
			$return='';
			//get all of the tables
			if($tables == '*')
			{
				$tables = array();
				$result = mysql_query('SHOW TABLES');
				while($row = mysql_fetch_row($result))
				{
					$tables[] = $row[0];
				}
			}
			else
			{
				$tables = is_array($tables) ? $tables : explode(',',$tables);
			}
			
			//cycle through
			foreach($tables as $table)
			{
				$result = mysql_query('SELECT * FROM '.$table);
				$num_fields = mysql_num_fields($result);
				
				$return.= 'DROP TABLE '.$table.';';
				$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
				$return.= "\n\n".$row2[1].";\n\n";
				
				for ($i = 0; $i < $num_fields; $i++) 
				{
					while($row = mysql_fetch_row($result))
					{
						$return.= 'INSERT INTO '.$table.' VALUES(';
						for($j=0; $j<$num_fields; $j++) 
						{
							$row[$j] = addslashes($row[$j]);
							//$row[$j] = ereg_replace("\n","\\n",$row[$j]);
							if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
							if ($j<($num_fields-1)) { $return.= ','; }
						}
						$return.= ");\n";
					}
				}
				$return.="\n\n\n";
			}
			
			//save file
			date_default_timezone_set('Asia/Jakarta'); // CDT
			$info = getdate();
			$date = $info['mday'];
			$month = $info['mon'];
			$year = $info['year'];
			//$handle = fopen('backup/registrasi_Mhs/Pendaftaran-backup-'.time().'.sql','w+');
			$handle = fopen('backup/registrasi_Mhs/Pendaftaran-backup-'.$date.' - '.$month.' - '.$year.'.sql','w+');
			fwrite($handle,$return);
			fclose($handle);
			$conf=new dbCenter("");
			$conf->executeQuery2("DELETE FROM registrasimhs");
		}
		backup_tables('localhost','root','','sista', 'registrasimhs');
	}
	public function listkategoriTA(){
		$isi="";$halaman="";	
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		$sql = "SELECT * FROM kategori_ta";
		$conf=new dbCenter("");
		$data=$conf->executeQuery($sql);
		if(false == $data) {
			//throw new Exception('Query failed with: ' . mysqli_error());
		} 
		else {}
		$row_count = count($data);
		$data=null;		
		$items_per_page = 10;
		$page_count = 0;
		if (0 == $row_count) {} 
		else{	   
			$page_count = (int)ceil($row_count / $items_per_page);//ceil untuk pembulatan bilangan ke atas	   
			if($page > $page_count) {$page = 1;}
			$offset = ($page - 1) * $items_per_page;
			$sql = "SELECT * FROM kategori_ta LIMIT " . $offset . "," . $items_per_page;
			$conf=new dbCenter("");
			$data=$conf->executeQuery($sql);
			if(count($data)>0)
			{$notabel=$offset+1;
				foreach ($data as $tara){
					$isi.='<tr>
								<td>'.$notabel.'</td>
								<td>'.$tara["kategori"].'</td>
								<td><a href="?route=mypanel&action=EditKategoriTA&id='.$tara["id_kategori"].'" class="btn btn-info"> Ubah</a></td>
								<td><button class="btn btn-warning" onclick="open_box(\'Hapus Kategori TA '.$tara["kategori"].' ?\',\'hapusKategoriTA\',\''.$tara["id_kategori"].'\')"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>
							</tr>';	
					$notabel=$notabel+1;
				} 
			}	
			parent::$isitabel=$isi;
		}
	}
	public function isikategoriTA(){
		$conf=new dbCenter("");
		$data=$conf->executeQuery("select id_kategori from kategori_ta order by id_kategori desc limit 1");
		$row_count = count($data);
		if($row_count==0){$urutan=1;}
		else {foreach($data as $tara)
			{$urutan=$tara["id_kategori"]+1;}
		}
		$conf=new dbCenter("kategori_ta");
		$conf->siapkanRecord(array(
			"id_kategori"=>$urutan,
			"kategori"=>$_POST['kategoriTA']
		));
		$conf->simpan();
	}
	public function cariUpdateKategoriTA(){
		$login= new dbCenter("kategori_ta");
		$data=$login->ambilDataDenganKondisi(array
		(
			"id_kategori"=>$_GET['id']
		));
		return '<form role="form" method="post" action="?route=mypanel&action=UpdateKategoriTA">							
					<div class="form-group" id="divfieldjudulTA">
						<label>Kategori TA</label>
						<input type="text" class="form-control" value="'.$data[0]['kategori'].'" name="kategoriTA"/>
						<input type="hidden" value="'.$data[0]['id_kategori'].'" name="IdkategoriTA"/>
					</div>
					<input type="submit" value="Setuju Rubah" class="btn btn-primary"/>
					<input type="reset" value="Reset" class="btn btn-default"/>
					<a class="btn btn-default" href="?route=mypanel&action=kategoriTA"> Batal</a>
				</form>';
		
	}
	public function updatekategoriTAAct(){
		if (isset($_POST['IdkategoriTA'])){
			$conf= new dbCenter("kategori_ta");
			$conf->siapkanRecord(array(
				"kategori"=>$_POST['kategoriTA']
			));
			$conf->editBerdasarkan(array (
				"id_kategori"=>$_POST['IdkategoriTA']
			));
			header("Location:?route=mypanel&action=kategoriTA");				
		}
	}
	public function restorePendaftaranMhs(){
		$file1TmpLoc = $_FILES["fileRestoreRegMhs"]["tmp_name"];
		/*$conf=new dbCenter("");
		//$conf->executeQuery2("LOAD DATA INFILE 'backup/registrasi_Mhs/Pendaftaran.sql' INTO TABLE registrasimhs");*/
		
		$filename = $file1TmpLoc;//'backup/registrasi_Mhs/Pendaftaran.sql';
		// MySQL host
		$mysql_host = 'localhost';
		// MySQL username
		$mysql_username = 'root';
		// MySQL password
		$mysql_password = '';
		// Database name
		$mysql_database = 'sista';

		// Connect to MySQL server
		mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
		// Select database
		mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		// Loop through each line
		foreach ($lines as $line)
		{
			// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
			continue;

			// Add this line to the current segment
			$templine .= $line;
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';')
			{
				// Perform the query
				mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
				// Reset temp variable to empty
				$templine = '';
			}
		}
		return "Tables imported successfully";
		
	}
}
	
?>