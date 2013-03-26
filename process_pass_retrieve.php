<?php
include('functions.php');?>
<?php
	include('UncleJoesCookies.php');

	session_start();

//unset all error messages from previous attempt, if there is one
unset($_SESSION['ret_error']);
unset($_SESSION['found_email']);
unset($_SESSION['ret_username']);
unset($_SESSION['sec_answer']);
unset($_SESSION['sec_answer']);



	
	
echo "Checking for email in database...";
	
	$email_address = strip_tags(trim($_POST['email_address']));
	$_SESSION['ret_username']= $email_address;
	$check_exists = get('email_address','memberregistration','email_address',''.$email_address);
	if(!isset($check_exists)){
		echo "Email not found";
		$_SESSION['ret_error']="true";
		$_SESSION['found_email'] = "This email address does not exist in out database";
		header("Location: index.php?job=pass_retrieve");
	}else{
		echo "We found it";
		header("Location: index.php?job=sec_question");
	}

?>