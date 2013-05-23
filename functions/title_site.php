<?php
	if(!isset($_GET['act'])){
		echo "Selamat Datang di ";
	}else if($_GET['act']=='home'){
		echo "Home | ";
	}else if($_GET['act']=='barang'){
		echo "Berita | ";
	}else if($_GET['act']=='cari'){
		echo "Pencarian | ";
	}else if($_GET['act']=='anggota'){
		echo "Anggota | ";
	}
?>