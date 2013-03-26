<?php	
	$hostname = "209.161.142.34";
	$username = "manus_web";
	$password = "boomTNT";
	$database = "manus";

	if (mysqli_connect($hostname, $username,$password, $database)) {
		echo "connected";
	} else {
		echo "failed";
	}
	
//	$cxn = mysqli_connect($hostname, $username,$password, $database) or die("Login failed.");
//	mysqli_select_db($cxn, $database) or die("Database selectino failed");
	
?>