<?php
	
	function get($descriptor, $table, $identifier, $id_value){
			include('UncleJoesCookies.php');
			$cxn = mysqli_connect("localhost", "root","", "dl")
				or die("Login failed.");
			mysqli_select_db($cxn, "dl")
				or die("Database selectino failedx");
			$query= "Select $descriptor from $table where $identifier = '$id_value'" ;
			$result = mysqli_query($cxn, $query)
				or die("Query failed");
			$row = mysqli_fetch_assoc($result);
			return $row[$descriptor];
		
			}
			
	function execute($input_query){
	include('UncleJoesCookies.php');
	
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
	$result = mysqli_query($cxn, $input_query)
		or die(mysql_error());
	
	}	

$current_page_views = get("page_views","profile","member_index",''.$_SESSION['member_index']);	
//echo $current_page_views;
$current_page_views = $current_page_views + $_SESSION['page_views'];
//echo $current_page_views;

	$update_query = "update profile set page_views = '".$current_page_views."' where member_index = '".$_SESSION['member_index']."'";
	execute($update_query);
	if(isset($_SESSION))
	{
	unset($_SESSION);
	session_destroy();
	}
	//echo "Session destroyed.";
	header("Location: index.php");
?>