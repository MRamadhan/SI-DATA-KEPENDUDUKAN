<?php
	session_start();
	if(file_exists("configurasi/conn.php")){
		include "configurasi/conn.php";
	}else if(file_exists("../configurasi/conn.php")){
		include "../configurasi/conn.php";
	}else if(file_exists("../../configurasi/conn.php")){
		include "../../configurasi/conn.php";
	}
	if (isset($_POST['submit'])){
		$user = addslashes($_POST['username']);
		$pass = md5(addslashes($_POST['password']));
		$sbg = addslashes($_POST['sebagai']);
		
		if(($user=='')or($pass=='')or($sbg=='')){
			echo "<script>alert('Harap isi semuanya terlebih dahulu');document.location='../';</script>";
		}else{
			$login=mysql_query("SELECT * FROM $sbg WHERE nama_$sbg ='$user' AND password='$pass'");
			$row=mysql_num_rows($login);
			if($row == 1){
				$_SESSION['sebagai'] = $sbg;
				$_SESSION['nama'] = $user;
				$_SESSION['pass'] = $pass;
				$s = strtoupper($sbg);
				echo "<script>alert('Selamat Datang $s');document.location='../home';</script>";
			}else{
				echo "<script>alert('Data tidak ditemukan');document.location='../';</script>";
			}
		}
	}
?>