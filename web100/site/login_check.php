<?php

	if (!isset($_POST['user_id']) || !isset($_POST['password'])){
		die("parameter error");
	}

	$flag = "/flag.txt";

	$id = $_POST['user_id'];
	$ps = $_POST['password'];

	mysql_connect("localhost","codegate","codegate");
	mysql_select_db("codegate");

	$id = mysql_real_escape_string($id);
	$ps = mysql_real_escape_string($ps);

	$ps = hash("whirlpool",$ps, true);

	$result = mysql_query("select * from users where user_id='$id' and user_ps='$ps'");
	$row = mysql_fetch_assoc($result);

	if (isset($row['user_id'])) {
		if ($row['user_id'] == "admin") {
			echo "hello, admin<br />";
			die(file_get_contents($flag));
		} else {
			die("hello, ".$row['user_id']);
		}
	} else {
		msg("login failed..");
	}

	function msg($msg){
		echo "<script>";
		echo "alert('$msg');";
		echo "history.back();";
		echo "</script>";
	}

?>
