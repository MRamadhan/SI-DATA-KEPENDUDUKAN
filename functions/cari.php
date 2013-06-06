<?php
	if(isset($_POST['go'])){
		$cari =addslashes($_POST['cari']);
		if($cari==''){
			echo "<div class=\"wrapper col4\">
				<br class=\"clear\" />
				<div id=\"services\">
					<h1>harap isi data pencariannya terlebih dahulu</h1>
					<br class=\"clear\" />
				</div>
			</div>";
		}else{
			
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				$cr = preg_replace("/\s/","%",$cari);
				$jumlah = mysql_query("SELECT nama_anggota FROM anggota WHERE nama_anggota LIKE '%$cr%'");
				$jml = mysql_num_rows($jumlah); //9
				$bagi = $jml /3; // 3
				$intbagi = (int)$bagi;// 3
				$kali = $intbagi * 3; //9
				$anggota = mysql_query("SELECT * FROM anggota WHERE nama_anggota LIKE '%$cr%' ORDER BY id_anggota DESC LIMIT $kali");
				$mulai= 1;
				$tiga = 3;
				echo "<div class=\"wrapper col4\">
					<br class=\"clear\" />
					<div id=\"services\">
						<h1>Hasil Pencarian data : $cari</h1><ul>";
							while($b = mysql_fetch_array($anggota)){
								if($mulai == 1){
									echo "<li>";
								}else if($mulai == $tiga){
									echo "<li class=\"last\">";
									$tambah = $mulai + $tiga;
								}else if($mulai == $tambah){
									echo "<li class=\"last\">";
									$tambah = $mulai + $tiga;
								}else{
									echo "<li>";
								}
								echo "<div>
									<h2>$b[nama_anggota]</h2>
									<p>Jumlah : $b[jumlah_barang]<br>
									Harga : $b[harga_jual]</p>";
								include "functions/isset_link.php";
								echo "</div></li>";
								$mulai++;
							}
						echo "</ul><br class=\"clear\" />
					</div>
				</div>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
				$cr = preg_replace("/\s/","%",$cari);
				echo "
				<div class=\"wrapper col4\">
					<br class=\"clear\" />
					<div id=\"services\">
				<table border=\"1\" style=\"color:#000;\">
				<tr style=\"background:#ccc;\">
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-id_anggota-desc\"><img src=\"images/top.png\"/></a>ID Anggota
						<a style=\"float:right;\" href=\"cari-order-id_anggota-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-nama_anggota-desc\"><img src=\"images/top.png\"/></a>Nama KK
						<a style=\"float:right;\" href=\"cari-order-nama_anggota-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-alamat-desc\"><img src=\"images/top.png\"/></a>Alamat
						<a style=\"float:right;\" href=\"cari-order-alamat-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-telepon-desc\"><img src=\"images/top.png\"/></a>Telepon
						<a style=\"float:right;\" href=\"cari-order-telepon-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"30%\" style=\"border:1px solid #000;\">Proses</th>
				</tr>";
					if(!isset($_GET['order'])){
						$anggota = mysql_query("SELECT * FROM anggota WHERE nama_anggota LIKE '%$cr%'");
					}else{
						$order = addslashes($_GET['order']);
						$sort = addslashes($_GET['sort']);
						$anggota = mysql_query("SELECT * FROM anggota WHERE nama_anggota LIKE '%$cr%' ORDER BY $order $sort");
					}
					$mulai=1;
					while($b = mysql_fetch_array($anggota)){
						if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
						echo "<td style=\"border:1px solid #000;\">$b[id_anggota]</td>
						<td style=\"border:1px solid #000;\">$b[nama_anggota]</td>
						<td style=\"text-align:center;border:1px solid #000;\">$b[alamat]</td>
						<td style=\"text-align:center;border:1px solid #000;\">$b[telepon]</td>
						<td style=\"text-align:center;border:1px solid #000;\">
						<a href=\"anggota-$b[id_anggota]-edit\">Edit</a> | 
						<a href=\"anggota-$b[id_anggota]-hapus\">Hapus</a> | 
						<a href=\"anggota-$b[id_anggota]-titip\">Titip Barang</a>
						</td></tr>";
						$mulai++;
					}
				echo "</table>
			<br class=\"clear\" />
			<br class=\"clear\" />
	</div>
</div>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
				$cr = preg_replace("/\s/","%",$cari);
				echo "
				<div class=\"wrapper col4\">
					<br class=\"clear\" />
					<div id=\"services\">
				<table border=\"1\" style=\"color:#000;\">
				<tr style=\"background:#ccc;\">
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-id_anggota-desc\"><img src=\"images/top.png\"/></a>ID Anggota
						<a style=\"float:right;\" href=\"cari-order-id_anggota-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-nama_anggota-desc\"><img src=\"images/top.png\"/></a>Nama KK
						<a style=\"float:right;\" href=\"cari-order-nama_anggota-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-alamat-desc\"><img src=\"images/top.png\"/></a>Alamat
						<a style=\"float:right;\" href=\"cari-order-alamat-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-telepon-desc\"><img src=\"images/top.png\"/></a>Telepon
						<a style=\"float:right;\" href=\"cari-order-telepon-asc\"><img src=\"images/down.png\"/></a>
					</th>
				</tr>";
					if(!isset($_GET['order'])){
						$anggota = mysql_query("SELECT * FROM anggota WHERE nama_anggota LIKE '%$cr%'");
					}else{
						$order = addslashes($_GET['order']);
						$sort = addslashes($_GET['sort']);
						$anggota = mysql_query("SELECT * FROM anggota WHERE nama_anggota LIKE '%$cr%' ORDER BY $order $sort");
					}
					$mulai=1;
					while($b = mysql_fetch_array($anggota)){
						if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
						echo "<td style=\"border:1px solid #000;\">$b[id_anggota]</td>
						<td style=\"border:1px solid #000;\">$b[nama_anggota]</td>
						<td style=\"text-align:center;border:1px solid #000;\">$b[alamat]</td>
						<td style=\"text-align:center;border:1px solid #000;\">$b[telepon]</td>
						</td></tr>";
						$mulai++;
					}
				echo "</table>
			<br class=\"clear\" />
			<br class=\"clear\" />
					</div>
				</div>";
			}
		}
	}
?>