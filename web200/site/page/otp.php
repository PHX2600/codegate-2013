<div class="panel" align="justify">
	<span class="orangetitle">your password</span>
	<span class="bodytext"><br />
<?php
	include("./otp_util.php");
	echo "<br />";
	echo "<br />";
	echo "your ID : <b>".$_SERVER["REMOTE_ADDR"]."</b>";
	echo "<br />";
	echo "<br />";
	echo "your password : <b>".make_otp($_SERVER["REMOTE_ADDR"])."</b>";
	echo "<br />";
	echo "<br />";
	$time = 20 - (time() - ((int)(time()/20))*20);
	echo "you can login with this password for <b>$time secs</b>.";
?>
	</span>
</div>
