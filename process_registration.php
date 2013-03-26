<?php
	session_start();
	include('UncleJoesCookies.php');

include('functions.php');
?>
<?php
	
	//unset all error messages from previous attempt, if there is one
unset($_SESSION['reg_error']);
unset($_SESSION['password_mismatch']);
unset($_SESSION['format_incorrect_reg']);
unset($_SESSION['email_exists']);
unset($_SESSION['field_blank']);
unset($_SESSION['pass_too_short']);
unset($_SESSION['pass_format_incorrect_reg']);

	
	//set defaults
//	echo "setting defaults...";
	
	//echo $_POST['first_name'];
	//echo $_POST['last_name'];
//	echo $_POST['email_address'];
	///echo $_POST['maiden_name'];
	//
	$_SESSION['fn']= $_POST['first_name'];
	$_SESSION['ln']= $_POST['last_name'];
	$_SESSION['em']= $_POST['email_address'];
	$_SESSION['mn']= $_POST['maiden_name'];
	
	
	//check for pass mismatch
//	echo "Checking for pass mismatch...";
	$form_user_pass1 = md5($_POST['pass1']);
	$form_user_pass2 = md5($_POST['pass2']);
	if(!$form_user_pass1 == $form_user_pass2 ){
		$_SESSION['reg_error']="true";
		$_SESSION['password_mismatch'] = "Passwords do not match.";
//		echo "passwords dont match";
	}
	
	//check names for improper format
//	echo "Checking format...";
	if(!preg_match("/^[A-Za-z' -]{1,50}$/",$_POST['first_name'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect_reg'])) $_SESSION['format_incorrect_reg']=" ";
		$_SESSION['format_incorrect_reg'] .= "&nbsp;[first name]&nbsp;";
	//	echo "firstname wrong";
	}
	if(!preg_match("/^[A-Za-z' -]{1,50}$/",$_POST['last_name'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect_reg'])) $_SESSION['format_incorrect_reg']=" ";
		$_SESSION['format_incorrect_reg'] .= "&nbsp;[last name]&nbsp;";
	//	echo "last name wrong";
	}if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['maiden_name'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect_reg'])) $_SESSION['format_incorrect_reg']=" ";
		$_SESSION['format_incorrect_reg'] .= "&nbsp;[maiden name]&nbsp;";
//		echo "maiden wrong";
	}/*if(!isValidInetAddress($_POST['email_address'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect_reg'])) $_SESSION['format_incorrect_reg']=" ";
		$_SESSION['format_incorrect_reg'] .= "&nbsp;[email address]&nbsp;";
//		echo "email wrong";
	}
	*/
	
	if(!preg_match("/^[A-Za-z)(0123456789~!@#$%^&*_=+?|' -]{8,50}$/",$_POST['pass1'])){
		$_SESSION['reg_error']="true";
		$_SESSION['pass_format_incorrect_reg']= "Your password is too short, too long, or contains invalid characters.";
//		echo "school name wrong";
	}
	
	
	//testing if username exists
//	echo "Checking for username double...";
	$email_address = strip_tags(trim($_POST['email_address']));
	$check_exists = get('email_address','memberregistration','email_address',''.$email_address);
	if(isset($check_exists)){
		$_SESSION['reg_error']="true";
		$_SESSION['email_exists'] = "An account is already registered for this email account.";
//		echo "email exists for this account";
	}
	
	//check password length
	if(strlen($_POST['pass1'])<8){
		$_SESSION['reg_error']="true";
		$_SESSION['pass_too_short'] = "Your password does not meet the limit of eight characters.";
	}
	
	//check for empty values
//	echo "Checking for empty values...";
	if(empty($_POST['email_address']) or empty($_POST['first_name']) or empty($_POST['last_name']) or empty($_POST['pass1']) or empty($_POST['pass2'])  or empty($_POST['sec_question'])  or empty($_POST['sec_answer'])){
		$_SESSION['reg_error']="true";
		$_SESSION['field_blank'] = "You left one or more fields blank.";
//		echo "field blank";
	}
	
	//redirect after error testing
	if(isset($_SESSION['reg_error'])){
		header("Location: index.php?job=register");
	}
	
	//clean data and set intermediary variables
	
	$first_name = ucwords(strip_tags(trim($_POST['first_name'])));
	$last_name = ucwords(strip_tags(trim($_POST['last_name'])));
	$maiden_name = ucwords(strip_tags(trim($_POST['maiden_name'])));
	$sec_question = strip_tags(trim($_POST['sec_question']));
	$sec_answer = strtr(strtolower(strip_tags(trim($_POST['sec_answer'])))," ","");
	
//	echo "Data trimmed and tags stripped.";
	//take current time
	$date = date('l jS \of F Y h:i:s A');
//	echo "Todays date created";
	
	if(empty($maiden_name) or $maiden_name == "(if applicable)"){
		$maiden_name = null;
//		echo "Maiden name set to ". $maiden_name;
	}
	$query = "insert into memberregistration (first_name,last_name,maiden_name,email_address,
	user_pass,registration_date,sec_question,sec_answer) values ('$first_name', '$last_name',
	'$maiden_name','$email_address','$form_user_pass1','$date','$sec_question','$sec_answer')";
	execute($query);
//	echo "Member created";
/*
//	$query1 = " INSERT INTO `profile` (
`school_name_1` ,
`school_name_2` ,
`school_name_3` ,
`school_name_4` ,
`hs_picture` ,
`current_picture` ,
`job_company` ,
`job_position` ,
`undergrad_college` ,
`gen_ed` ,
`phone_number` ,
`address_1` ,
`address_2` ,
`city` ,
`state` ,
`zip` ,
`privacy_setting` ,
`privacy_setting_2` ,
`member_index` ,
`school_id_1` ,
`school_id_2` ,
`school_id_3` ,
`school_id_4` ,
`class_of` ,
`page_views`
)
VALUES (
'', NULL , NULL , NULL , NULL , NULL  , ' ', ' ', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , '1','1','". get("member_index","memberregistration","email_address","$email_address")."', '0', NULL , NULL , NULL , '0', '1'
)";
	execute($query1);
	*/
	//echo "email retrieved";
	$member_index = get("member_index","memberregistration","email_address","$email_address");
	//echo "mi retrieved";
			$_SESSION['member_index']=$member_index;
			$_SESSION['logged_in'] = "true";
			$_SESSION['email_address'] = $email_address;
			$_SESSION['login_result'] = "Redirect failed";
			//echo "Session vars created.  Logged in variable set to ".$_SESSION['logged_in'];
			header("Location: generic.php?job=school_select");

?>