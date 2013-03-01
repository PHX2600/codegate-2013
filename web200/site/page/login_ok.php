<?php
	include("./otp_util.php");

	$flag = file_get_contents($flag_file);

	if (isset($_POST["id"]) && isset($_POST["ps"])) {
		$password = make_otp($_POST["id"]);
		sleep(3); // do not bruteforce

		if (strcmp($password, $_POST["ps"]) == 0) {
			echo "welcome, <b>".$_POST["id"]."</b><br />";
			echo "<input type='button' value='back' onclick='history.back();' />";

			if ($_POST["id"] == "127.0.0.1") {
				echo "<hr /><b>".$flag."</b><br />";
			}
		} else {
			echo "<script>alert('login failed..');history.back();</script>";
		}
	}

?>
