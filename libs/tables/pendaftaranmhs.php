<?php
require "../../models/dbCenter.php";
$offset=0;
$items_per_page=10;
$sql = "SELECT * FROM registrasimhs ORDER BY username asc LIMIT " . $offset . "," . $items_per_page;
		$conf=new dbCenter("");
		$data=$conf->executeQuery($sql);
		if(count($data)>0)
		{
			$json = '[';
			$first = true;
			$notabel=$offset+1;
			foreach ($data as $tara) 
			{		
				if (!$first) { $json .=  ','; } else { $first = false; }
				$json .= '{"no":"'.$notabel.'","BP":"'.$tara['username'].'","aktifkan":"<a href=\'#\'><span class=\'glyphicon glyphicon-hand-up\'></span> aktifkan</a>"}';
				$notabel=$notabel+1;
			}
			$json .= ']';
		}
echo $json;		
?>