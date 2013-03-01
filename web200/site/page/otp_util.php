<?php

	$flag_file = "/flag.txt";

	function make_otp($user) {
		// acccess for 20secs.
		$time = (int)(time()/20);
		$seed = md5(file_get_contents($flag_file)).md5($_SERVER['HTTP_USER_AGENT']);
		$password = sha1($time.$user.$seed);
		return $password;
	}

?>
