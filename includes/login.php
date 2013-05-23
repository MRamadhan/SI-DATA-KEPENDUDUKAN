<div id="newsletter">
	<h1>Login</h1>
	<form action="functions/login.php" method="post" enctype="multipart/form-data">
        <fieldset>
			<input type="text" name="username" placeholder="Username"/>
			<input type="password" name="password" placeholder="Password"/>
		</fieldset>
		<hr>
        <fieldset>
			<select style="padding:4px;border:1px solid #000;width:155px;" name="sebagai">
				<option value="anggota">Anggota</option>
				<option value="pengurus">Pengurus</option>
			</select>
			<input style="float:right;padding:4px;border:1px solid #000;width:155px;" type="submit" name="submit" id='news_go' value="LOGIN" />
        </fieldset>
		<hr>
	</form>
</div>