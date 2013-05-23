<?php
	session_start();
	include "../../../configurasi/conn.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$insert = mysql_query("INSERT INTO barang(id_barang,nama_barang,jumlah_barang,harga_jual) values('$id','$nama','$jumlah','$harga')");
		if($insert){
			echo "<script>alert('Data Barang berhasil ditambah');document.location='../../../barang';</script>";
		}else{
			echo "<script>alert('Data Barang gagal ditambah');document.location='../../../barang';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>