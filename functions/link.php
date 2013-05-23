<?php
	if(!isset($_GET['act'])){
		include "includes/intro.php";
	}else if($_GET['act']=='home'){
		include "includes/intro.php";
	}else if($_GET['act']=='barang'){
		include "includes/contents/barang.php";
	}else if($_GET['act']=='anggota'){
		include "includes/contents/anggota.php";
	}else if($_GET['act']=='cari'){
		include "functions/cari.php";
	}else if($_GET['act']=='logout'){
		include "functions/logout.php";
	}
?>