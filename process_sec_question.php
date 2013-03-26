<?php
include('functions.php');?>
<?php
	include('UncleJoesCookies.php');

	session_start();

//unset all error messages from previous attempt, if there is one
unset($_SESSION['ret_error']);
unset($_SESSION['answer_wrong']);



//can retrieve any data point from any table, the row is designated with a where statement based on the identifier and its value
	
echo "Checking for username double...";
	$_SESSION['sec_answer'] = $_POST['sec_answer'];
	$sec_answer = strtr(strtolower(strip_tags(trim($_POST['sec_answer'])))," ","");
	
	$check_exists = get('sec_answer','memberregistration','email_address',''.$_SESSION['ret_username']);
	echo "sec_answer is retrieved from databse.  value =";
	echo $check_exists;
	if($sec_answer == $check_exists){
		echo "match is good";
		$_SESSION['match'] = "true";
		header("Location: index.php?job=eat_cookies");
	}else{
	echo "NO MATCH";
		$_SESSION['ret_error']="true";
		$_SESSION['answer_wrong']="The answer you entered is incorrect.";
		header("Location: index.php?job=sec_question");
	}

?>