<?php

	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<p class=\"readmore\"><a href=\"home\">LOGIN DAHULU</a></p>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		echo "<p class=\"readmore\"><a href=\"barang\">Lihat Detail Barang</a></p>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
		echo "<p class=\"readmore\"><a href=\"barang\">Lihat Barang</a></p>";
	}

?>