<?php
	include('UncleJoesCookies.php');

	session_start();
?>

	<span style="font-size:2em; text-decoration:underline;text-align:center;color:#12146B;">Security Question</span>
<?php
	echo "<div style='color:black;border:0px orange solid;"; 
	if($_SESSION['ret_error'] == 'true'){
		unset($_SESSION['ret_error']);
		echo "padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['answer_wrong'])){
			echo "<li>".$_SESSION['answer_wrong']."</li>";
		}
	}else{
		echo "color:black;margin:0px;padding:0px;'>";
	}
	echo "</ul></div>";
	?>
	
	
	<form style='margin:5px;padding:5px;text-align:center;' action='process_sec_question.php' method='POST'>
	
	<?php
	echo "Account found for email address: ".$_SESSION['ret_username'] ."<br/>";
	echo "Your security question is:<br/><br/>";
	$sec_question = get("sec_question","memberregistration","email_address","".$_SESSION['ret_username']);
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sec_question;
	?>
	
	
	<br/><span style='color:#12146B;font-weight:bold';>Answer:</span><input type='text' name='sec_answer' id='sec_answer' size='28' maxlength='28'
	<?php
	echo "value='";
		
		if(isset($_SESSION['sec_answer'])){//auto-fills form if the form was returned due to an error
			echo $_SESSION['sec_answer'];
			
		}echo "'  />";
		?>
	
	
<center>
<input type='submit' value='Go'/>
</center>


</form>