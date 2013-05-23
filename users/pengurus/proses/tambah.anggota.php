<?php
	session_start();
	include "../../../configurasi/conn.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		$id = $_POST['id'];
		$pass = md5($_POST['id']);
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$insert = mysql_query("INSERT INTO anggota(id_anggota,nama_anggota,password,alamat,telepon) values('$id','$nama','$pass','$alamat','$telepon')");
		if($insert){
			echo "<script>alert('Data Anggota berhasil ditambah');document.location='../../../anggota';</script>";
		}else{
			echo "<script>alert('Data Anggota gagal ditambah');document.location='../../../anggota';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>