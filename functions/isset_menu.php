<?php

	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<li class=\"last\"><a href=\"layanan\">Pelayanan</a></li>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		echo "<li><a href=\"anggota\">Anggota</a></li>
		<li><a href=\"kasir\">Kasir</a></li>
		<li><a href=\"laporan\">Laporan Transaksi</a></li>
		<li class=\"last\"><a href=\"layanan\">Pelayanan</a></li>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
		echo "<li><a href=\"anggota\">Data Anggota</a></li>
		<li class=\"last\"><a href=\"layanan\">Pelayanan</a></li>";
	}

?>