<?php
	session_start();
	unset($_SESSION['login_result']);
	//set include_path in php.ini
	//ini_set("include_path",".:.\includes");

	//include("UncleJoesCookies.inc");

	//can retrieve any data point from any table, the row is designated with a where statement based on the identifier and its value
function get($descriptor, $table, $identifier, $id_value){
	include('UncleJoesCookies.php');
			$cxn = mysqli_connect($hostname, $username, $password, $database)
				or die("Login failed.");
			mysqli_select_db($cxn, $database)
				or die("Database selection failedx");
	
	
			$query= "Select $descriptor from $table where $identifier ='$id_value'";
			$result = mysqli_query($cxn, $query)
				or die(mysqli_error($cxn));
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

	
	$form_user_pass = md5($_POST['user_pass']);
	//echo $form_user_pass;
	$form_uname  = $_POST['username'];
	//echo get("user_pass","memberregistration","email_address","$form_uname");
	
//retrieve variables from data base to set as session vars later on
	$db_email = get("email_address","memberregistration","email_address","$form_uname");
	//echo "email retrieved ".$db_email;
	$member_index = get("member_index","memberregistration","email_address","$form_uname");
	//echo "mi retrieved: " .$member_index;
	$db_school = get("school_name_1","profile","member_index","$member_index");
	//echo "school retrieved ".$db_school;
	
	//testing if username exists
	if($form_uname == $db_email){
	///	echo "username found";
	//testing if passwords match
	if($form_user_pass == get("user_pass","memberregistration","email_address","$form_uname"))
		{

			$_SESSION['member_index']=$member_index;
	//		echo $_SESSION['member_index'];
			$_SESSION['logged_in'] = "true";
	//		echo $_SESSION['logged_in'];
			$_SESSION['email_address'] = $db_email;
			$_SESSION['member_index'] = $member_index;
			$_SESSION['display'] = "passwords match!!! Session started. logged in variable set to ".$_SESSION['logged_in'];
			$sid1 = get("school_id_1","profile","member_index","".$_SESSION['member_index']);
			if(isset($sid1)) $_SESSION['school_id_1'] = $sid1;
			$sn = get("school_name_1","profile","member_index","".$_SESSION['member_index']);
			if(isset($sn)) $_SESSION['school_name_1'] = $sn;
			$sid1 = get("school_id_1","profile","member_index","".$_SESSION['member_index']);
			if(isset($sid1)) $_SESSION['school_id_1'] = $sid1;
			
			$date=date('l jS \of F Y h:i:s A');

			$login_query="insert into login (member_index, username,login_date) value ('$member_index','$db_email','$date')";
			execute($login_query);
			
			header("Location: generic.php");
}else{
//what is printed if password is wrong
$_SESSION['login_result'] = "Invalid password.  Please try again.";
//echo "bad pass";
header("Location: index.php");
}

}else{
//what is printed if uname deos not exist
	$_SESSION['login_result'] = "That email doesn't exist in our database.";
	//echo "bad uname";
	header("Location: index.php");
}

?>