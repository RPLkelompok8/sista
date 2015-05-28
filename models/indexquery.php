<?php
class indexquery extends index{
	function __construct() {
		$isi="";$halaman="";	
		if (isset($_GET['pages'])){$page=$_GET['pages'];}else{$page=1;}
		$sql = "SELECT username FROM ta2 where ditampilkan='1'";
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
			$sql = "SELECT * FROM ta2 where ditampilkan='1' ORDER BY username asc LIMIT " . $offset . "," . $items_per_page;
			$conf=new dbCenter("");
			$data=$conf->executeQuery($sql);
			if(count($data)>0)
			{$notabel=$offset+1;
				foreach ($data as $tara){
					$sql = "SELECT name FROM user where username='".$tara["username"]."'";
					$cariname=new dbCenter("");
					$data1=$cariname->executeQuery($sql);
					$nama=str_replace("[|*apstrf*|]","'", $data1[0]["name"]);
					$isi.='<tr>
								<td>'.$notabel.'</td>
								<td>'.$tara["username"].'</td>
								<td>'.$nama.'</td>
								<td>'.$tara["judul"].'</td>
								<td>'.$tara["abstrak"].'</td>
								<td><a href="documents/tugas_akhir/fileTA/'.$tara["file_ta"].'" class="button" download> Download</a></td>
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
				return '<a href="?pages=' . $posisi . '">Page ' . $posisi . '</a>,';
			}
			if ($page_count>7)
			{
				$mentok=0;
				if($page>4)
				{
					$halaman.= '<a href="?pages=1"><<</a> ...';
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
					 $halaman.='<a href="?pages='.$page_count.'">>></a>';
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
					$halaman.='<a href="?pages='.$page_count.'">>></a>';
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
}
?>