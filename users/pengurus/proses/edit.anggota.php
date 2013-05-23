<?php
	session_start();
	include "../../../configurasi/conn.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$edit = mysql_query("UPDATE anggota SET nama_anggota='$nama',alamat='$alamat',telepon='$telepon' WHERE id_anggota='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../anggota';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../anggota-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>