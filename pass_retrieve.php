<?php
	include('UncleJoesCookies.php');

	session_start();
?>

	<span style="font-size:2em; text-decoration:underline;text-align:center;color:#12146B;">Password Retrieve</span>

	<?php
	echo "<div style='color:black;border:0px orange solid;"; 
	if($_SESSION['ret_error'] == 'true'){
		echo "padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['found_email'])){
			echo "<li>".$_SESSION['found_email']."</li>";
		}
	}else{
		echo "color:black;margin:0px;padding:0px;'>";
	}
	echo "</ul></div>";
	?>
	
	<form style='margin:5px;padding:5px;text-align:center;' action='process_pass_retrieve.php' method='POST'>
	
	<br/><br/><span style='color:#12146B;font-weight:bold';>Enter email address:</span><br/><input type='text' name='email_address' id='email_address' size='28' maxlength='28'
	<?php
	echo "value='";
		
		if(isset($_SESSION['ret_username'])){//auto-fills form if the form was returned due to an error
			echo $_SESSION['ret_username'];
			
		}echo "'  />";
		?>
	
	
<center>
<input type='submit' value='Go'/>
</center>


</form>