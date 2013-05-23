<div class="wrapper col1">
	<div id="header">
		<div id="logo">
			<h1><a href="home">Sistem Informasi Kependudukan Desa ( SIKDES )</a></h1>
		</div>
		<?php
		if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
			include "includes/login.php";
		}else{
			include "users/welcome.php";
		}
		?>
		<br class="clear" />
	</div>
</div>