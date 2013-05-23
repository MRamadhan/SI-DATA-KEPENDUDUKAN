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
		$edit = mysql_query("UPDATE barang SET nama_barang='$nama',jumlah_barang='$jumlah',harga_jual='$harga' WHERE id_barang='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../barang';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../barang-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>