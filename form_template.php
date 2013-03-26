<?php
include('functions.php');
?>
<?php
	include('UncleJoesCookies.php');

	session_start();
?>

	<span style="font-size:2em; text-decoration:underline;text-align:center;color:#12146B;">
	<!--//TITLE-->
	</span>
<?php
	echo "<div style='color:black;border:0px orange solid;"; 
	if($_SESSION['/*general error name*/'] == 'true'){
		unset($_SESSION['/*general error name*/']);
		echo "padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['/*specific error*/'])){
			echo "<li>".$_SESSION['/*specific error*/']."</li>";
		}if(isset($_SESSION['/*specific error*/'])){
			echo "<li>".$_SESSION['/*specific error*/']."</li>";
		}//Add more as needed
		
	}else{
		echo "color:black;margin:0px;padding:0px;'>";
	}
	echo "</ul></div>";
	?>
	
	
	<form style='margin:5px;padding:5px;text-align:center;' action='/*process file*/' method='POST'>
	
	<?php
	echo "/*Messages*/<br/><br/>";
	echo "/*more messages*/<br/><br/>";
	
	//retrieve variables
	$name = get("","","","");
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sec_question;//as needed
	?>
	
	<!--//Input box style-->
	<br/><span style='color:#12146B;font-weight:bold';>Answer:</span><input type='text' name='sec_answer' id='sec_answer' size='28' maxlength='28'
	<?php
	echo "value='";
		
		if(isset($_SESSION['sec_answer'])){//auto-fills form if the form was returned due to an error
			echo $_SESSION['sec_answer'];
			
		}echo "'  />";
		?>
	
	//SUBMIT BUTTON
<center>
<input type='submit' value='Go'/>
</center>


</form>