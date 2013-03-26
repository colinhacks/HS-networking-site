<?php

	echo "<span style='font-size:2em; text-decoration:underline;text-align:center;color:#12146B;'>Registration</span>\n";
	echo "<div style='color:black;border:0px orange solid;"; 
	if($_SESSION['reg_error'] == 'true' ){
		echo "padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['password_mismatch'])){
			echo "<li>".$_SESSION['password_mismatch']."</li>";
		}if(isset($_SESSION['format_incorrect_reg'])){
			echo "<li>".$_SESSION['format_incorrect_reg']."</li>";
		}if(isset($_SESSION['format_incorrect_reg'])){
			echo "<li>".$_SESSION['format_incorrect_reg']."</li>";
		}if(isset($_SESSION['pass_format_incorrect_reg'])){
			echo "<li>The ".$_SESSION['pass_format_incorrect_reg']." you entered contains invalid characters. </li>";
		}if(isset($_SESSION['email_exists'])){
			echo "<li>".$_SESSION['email_exists']."</li>";
		}if(isset($_SESSION['field_blank'])){
			echo "<li>".$_SESSION['field_blank']."</li>";
		}if(isset($_SESSION['pass_too_short'])){
			echo "<li>".$_SESSION['pass_too_short']."</li>";
		}if(isset($_SESSION['pass_format_incorrect'])){
			echo "<li>".$_SESSION['pass_format_incorrect']."</li>";
		}
		
		
	}else{
		echo "color:black;margin:0px;padding:0px;'>";
	}
	echo "</ul></div>";
	//echo "<div style=''";
	echo "<center>";
	echo "<div  style='width:auto;margin-left:auto;margin-right:15%'>";
	echo "<form enctype='multipart/form-data' style='color:#12146B;font-weight:bold;margin:5px;padding:5px;border:0px black solid;text-align:right' action='process_registration.php' method='POST'>";
	echo "<table style='border:0px black solid;width:100%;text-align:right;'><tr><td>";
	echo "First name: <input style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' type='text' name='first_name' size='28' maxlength='25' value='";
		if(isset($_SESSION['fn'])){
		echo $_SESSION['fn'];}
	echo "'/> <br/>";
	
	echo "Last name: <input style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' type='text' name='last_name' size='28' maxlength='40' value='";
		if(isset($_SESSION['ln'])){
		echo $_SESSION['ln'];}
	echo "'/><br />";
	
	echo " Maiden name: <input style='margin:5px;padding:5px;border:2px #12146B solid;background-color:LightGrey;text-align:center;' value='(if applicable)' class='optional' type='text' name='maiden_name' size='28' maxlength='50' value='";
		if(isset($_SESSION['mn'])){
		echo $_SESSION['mn'];}
	echo "'/><br />\n";
	
	echo " Email address: <input type='text' style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' name='email_address' size='28' maxlength='30' value='";
		if(isset($_SESSION['em'])){
		echo $_SESSION['em'];}
	echo "'/><br />\n";
	
	echo "  Password (MIN 8 characters):<input type='password' style='margin:5px;text-align:center;padding:5px;border:2px #12146B solid;' name='pass1' size='28' maxlength='100'/><br/>\n";
	
	echo "  Confirm:<input type='password' style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' name='pass2' size='28' maxlength='100'/><br/>\n";
	
	echo " Security question: <input type='text' style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' name='sec_question' size='50' maxlength='200' value='";
		if(isset($_SESSION['sq'])){
		echo $_SESSION['sq'];}
	echo "'/><br />\n";
	
	echo "Answer: <input type='text' style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' name='sec_answer' size='28' maxlength='50' value='";
		if(isset($_SESSION['sa'])){
		echo $_SESSION['sa'];}
	echo "'/><br />\n";
	
	echo "  <input class='button' style='color:white;font-weight:bold;font-family:'Times New Roman',Serif;' type='submit' value='Register!'/>\n";
	echo '</form></div></center>';
	
?>