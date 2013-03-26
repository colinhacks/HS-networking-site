<?php
	include('UncleJoesCookies.php');

	session_start();
	
	
	
function get($descriptor, $table, $identifier, $id_value){

	echo "function starts.  ";
	include('UncleJoesCookies.php');
	
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	echo "connected.  ";
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
	
	$query= "Select $descriptor from $table where $identifier ='$id_value'";
	echo $query;
	echo "Yay. $descriptor ";
	echo $descriptor; 
	
		$result = mysqli_query($cxn, $query)
	or die(" $descriptor Query failed");
	$row = mysqli_fetch_assoc($result);
	return $row[$descriptor];
	echo $row[$descriptor];

	}
	
	echo "Sup.";
	
$name = get('username', 'login', 'member_index','1');
echo "The username is: ";
echo $name;
	
	
	?>