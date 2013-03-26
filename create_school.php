<?php
	include('UncleJoesCookies.php');

	session_start();
	unset($_FILES);

	echo "<span style='font-size:2em; text-decoration:underline;text-align:center;color:#12146B;'>Create School</span>\n";
	if($_SESSION['sch_error'] == 'true'){
	
		echo "<div style='color:black;border:0px orange solid;padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['password_mismatch'])){
			echo "<li>".$_SESSION['password_mismatch']."</li>";
		}if(isset($_SESSION['format_incorrect'])){
			echo "<li>The ".$_SESSION['format_incorrect']." you entered contains invalid characters. </li>";
		}if(isset($_SESSION['base_exists'])){
			echo "<li>".$_SESSION['email_exists']."</li>";
		}if(isset($_SESSION['city_exists'])){
			echo "<li>".$_SESSION['city_exists']."</li>";
		}if(isset($_SESSION['site_exists'])){
			echo "<li>".$_SESSION['city_exists']."</li>";
		}if(isset($_SESSION['field_blank'])){
			echo "<li>".$_SESSION['field_blank']."</li>";
		}if(isset($_SESSION['school_site_no_exist'])){
			echo "<li>".$_SESSION['school_site_no_exist']."</li>";
		}if(isset($_SESSION['network_site_no_exist'])){
			echo "<li>".$_SESSION['network_site_no_exist']."</li>";
		}if(isset($_SESSION['upload_error'])){
			echo "<li>".$_SESSION['upload_error']."</li>";
		}if(isset($_SESSION['upload_error2'])){
			echo "<li>".$_SESSION['upload_error2']."</li>";
		}
		echo "</ul></div>";
	}
	
	

	
	echo "<form enctype='multipart/form-data' style='color:#A80000;font-weight:bold;margin:5px;padding:5px;border:0px black solid;' action='process_create_school.php' method='POST'>";
	
	echo "<table style='border:0px black solid;width:100%;text-align:right;'>";
	echo "<tr>";
	
	echo "<td valign='top' style='text-align:right;>\n";
	
	echo " <input type='text' name='dfg' id='dfg' size='0' maxlength='0' value=''/> <br/>";
	

	
	echo "School name:<input type='text' name='school_name' id='school_name' size='28' maxlength='28' style='border:2px #12146B solid;' value='";
		if(isset($_SESSION['sn'])){
		echo $_SESSION['sn'];}
	echo "'/> <br/>";
	
	echo "Town/city: <input type='text' name='city' id='city' size='28' maxlength='30' style='border:2px #12146B solid;'value='";
		if(isset($_SESSION['tn'])){
		echo $_SESSION['tn'];}
	echo "'/><br/>\n";
	
	echo "State/region: <input type='text' name='state' id='state' size='28' maxlength='30' style='border:2px #12146B solid;'value='";
		if(isset($_SESSION['tn'])){
		echo $_SESSION['tn'];}
	echo "'/><br/>\n";
	
	echo "Base(s) served:<input  type='text' name='base1' style='border:2px #12146B solid;' id='base1' size='28' maxlength='50' value='";
		if(isset($_SESSION['base1'])){
		echo $_SESSION['base1'];}
	echo "'/><br />";
	echo "<input style='margin-left:20px;background-color:LightGrey;border:2px #12146B solid;' type='text' name='base2' id='base2'  size='28' maxlength='50' value='";
		if(isset($_SESSION['base2'])){
		echo $_SESSION['base2'];}
	echo "'/><br />";
	echo "<input style='margin-left:20px;background-color:LightGrey;border:2px #12146B solid;' type='text' name='base3' id='base3' size='28' maxlength='50' value='";
		if(isset($_SESSION['base3'])){
		echo $_SESSION['base3'];}
	echo "'/><br />";
	
	
	echo "Region: <select name='region' style='margin:5px;padding:5px;border:2px #12146B solid;color:#12146B;font-weight:bold;>";
	echo "	<option value=''> </option>";
	echo "	<option value='europe'>DoDDS Europe</option>";
	echo "	<option value='pacific'>DoDDS-Pacific/DDESS-Guam</option>";
	echo "	<option value='ddess'>DDESS/DoDDS-Cuba</option>";
	echo "</select>";
	 
	echo "</td>";
	
	//Table data break
	
	echo "<td valign='top' style='border:0px green solid;text-align:right'>";
	
	echo "<br/>Mascot (plural form):<input  type='text' style='border:2px #12146B solid;' name='mascot' id='mascot' size='28' maxlength='30' value='";
		if(isset($_SESSION['ms'])){
		echo $_SESSION['ms'];}
	echo "'/><br />";
	
	include('country_options.php');
	echo "<br />";
	
	
	echo "School website:<input type='text' style='background-color:LightGrey;border:2px #12146B solid;' name='school_website' id='school_website' size='28' maxlength='100' value='";
		if(isset($_SESSION['url1'])){
		echo $_SESSION['url1'];}
		else{
			echo "http://";
		}
	echo "'/><br />\n";
	
		echo "Existing alumni networking website:<input type='text' style='border:2px #12146B solid;background-color:LightGrey' name='network_website' id='network_website' size='28' maxlength='100' value='";
		if(isset($_SESSION['url2'])){
		echo $_SESSION['url2'];}
		else{
			echo "http://";
		}
	echo "'/><br />\n";
	
	echo "School picture (main building, sign, etc.):<br/><input style='border:2px #12146B solid;' type='file' id='school_picture' name='school_picture' size='28' maxlength='100' /><br />";
	
	echo "Mascot picture:<br/><input type='file' name='mascot_picture' style='border:2px #12146B solid;' id='mascot_picture' size='28' maxlength='100' /><br />";
	

	
	
	echo "</td>";
	echo "</tr>";
echo "</table>";
echo "<br/><center>You will have to approve changes to this page until one of your peers volunteers, so tell all your friends to join this class!<br/>";
echo "<a target='_blank' style='hover:text-decoration:underline;color:#12146B' href='generic.php?job=admin_responsibilities' >What are the responsibilities of an admin?<a><br/>";
echo "<span style='font-size:small'>(will open in a new tab or window)</span>";
echo "<br/>	<input style='font-family: times,Serif;font-weight:bold;color:#12146B' type='submit' value='Create!'/>\n</center>";
echo "</form>";

?>