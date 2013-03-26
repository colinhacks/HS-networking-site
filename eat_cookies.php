<?php

	if(isset($_SESSION['match'])){
		//header("Location: index.php");
	}else{
		unset($_SESSION['match']);
	}
	

	include('UncleJoesCookies.php');

	session_start();

	echo "<span style='font-size:2em; text-decoration:underline;text-align:center;color:#12146B;'>Password Reset</span><br/><br/>\n";
	
	$randomPass = generatePassword(8);
	$sent_password = $randomPass;
	echo "<br/><br/>$sent_password and ".$sent_password." <br/><br/>";
	$password = md5($randomPass);
	echo "Old pass:".get("user_pass","memberregistration","email_address","".$_SESSION['ret_username']);
	$query= "update memberregistration set user_pass = '$password' where email_address ='".$_SESSION['ret_username']."'";
	execute($query);
	echo "<br/>New pass:".get("user_pass","memberregistration","email_address","".$_SESSION['ret_username']);
	// multiple recipients
$to  = ''.$_SESSION['ret_username']; // note the comma
$from = 'colinmcd94@gmail.com';
$from_name = 'DoDEA Network Webmaster';
// subject
$subject = 'DoDEA Network -- Password Reset';

// message
//$message = 'Hey';

$message="
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
	<div align='center'><img src='logorevised.jpg' style='height: 90px; width: 340px'></div><br/>
    <h6 style='font-size:2em;text-align:left'>Your password was reset.  Log in with the following password:</h6>
    <center><span style='font-size:1.5em'><tt>$randomPass</tt></span><br/><br/>
	<a style='color:DarkBlue;'href='http://localhost:8888/index.php'>Login now!</a></center>
</body>
</html>";

// To send HTML mail, the Content-type header must be set
$headers = "";
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Colin'. "\r\n";
$headers .= 'From: colinmcd94@gmail.com' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
/*echo " mail(".$to.','. $subject.','. $message.','. $headers.');';
$dude = mail($to, $subject, $message, $headers);
if($dude){
	echo "Yay";
}else{
	echo "Sad";
}*/

mailer($to, $from, $from_name, $subject, $message, true); 


echo "<div style='margin:5px;padding:5px;text-align:center;text-size:1.5em'>A random password has been assigned to you and sent to&nbsp;<b>".$_SESSION['ret_username']."</b>.</div>";
	

	
echo "<form action='index.php' method='POST'>";
echo "<center><input type='submit' value='Return to Login' style='font-weight:bold;color:#12146B;'/>\n</center>";
echo "</form>";

?>