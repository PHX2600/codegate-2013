<div class="panel" align="justify">
	<span class="orangetitle">Login Form</span>
	<span class="bodytext"><br />

<form method="post" action="./page/login_ok.php">
	ID : <input type="text" name="id" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" readonly /><br />
	PS : <input type="password" name="ps" /><br />
	<input type="submit" value="login" />
</form>

	</span>
</div>
