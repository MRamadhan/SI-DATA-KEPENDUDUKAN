<?php
	session_start();
	include "../../../configurasi/conn.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		$select = mysql_query("SELECT * FROM pengurus WHERE nama_pengurus='$_SESSION[nama]' AND password='$_SESSION[pass]'");
		$jselect = mysql_num_rows($select);
		if($jselect == 1){
			$pengurus = mysql_fetch_array($select);
			$idPengurus = $pengurus['id_pengurus'];
			$id = $_POST['idbarang'];
			$anggota = $_POST['anggota'];
			$jumlah = $_POST['jumlah'];
			$harga = $_POST['harga'];
			$date = date('Y-m-d H:i:s');
			$insert = mysql_query("INSERT INTO titip_barang(id_pengurus,id_anggota,id_barang,jml_barang,tgl_titip,harga_beli)
			values('$idPengurus','$anggota','$id','$jumlah','$date','$harga')");
			if($insert){
				echo "<script>alert('Data berhasil dititipkan');document.location='../../../barang';</script>";
			}else{
				echo "<script>alert('Data gagal dititipkan, Mungkin Anggota sudah menitipkan barang ini');document.location='../../../barang-$id-titip';</script>";
			}
		}else{
			echo "<script>alert('Data Pengurus tidak ditemukan');document.location='../../../barang-$id-titip';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>