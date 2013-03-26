<?php
	include('UncleJoesCookies.php');

	session_start();

	function getRowsNoSort($table, $identifier, $id_value){
	include('UncleJoesCookies.php');
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failed.");
	echo "db selected";
	$query= "Select * from $table where $identifier = '$id_value'";
	//echo $query;
	$result = mysqli_query($cxn, $query)
		or die(mysql_error());
		echo "success";
	return $result;	}
	
//unset all error messages from previous attempt, if there is one
unset($_SESSION['sch_error']);
unset($_SESSION['password_mismatch']);
unset($_SESSION['format_incorrect']);
unset($_SESSION['email_exists']);
unset($_SESSION['field_blank']);
unset($_SESSION['school_site_no_exist']);
unset($_SESSION['network_site_no_exist']);
unset($_SESSION['upload_error']);
unset($_SESSION['upload_error2']);

	
	//redirect if not logged in
	if(!isset($_SESSION['logged_in'])){
		echo "redirect from school select if not logged in";
		//header("Location: index.php");
		
	}else{
		echo "logged in...redirect avoided...  ";
	}
	
	//test if school is already set
	echo $_SESSION['member_index'];
	$profile_school = getRowsNoSort("profile","member_index","".$_SESSION['member_index']);
	echo "row ret"; 
	if(mysqli_num_rows($profile_school) > 0){
		echo "school set already...redirect ...  ";
		//header("Location: generic.php");
	}else{
		echo "school not set... ";
	}
	echo "Diplay schoools:";
	//title of include, followed by div containing any error messages  
	echo "<span style='font-size:2em; text-decoration:underline;text-align:center;color:#12146B;'>School Selection</span>\n";
	
	
	
	echo "<form action='process_school_select.php' method='POST'>";
	//setting fieldsets
	
	
	
	echo "<fieldset  style='color:#12146B' >
	<legend>
	DDESS/DoDDS-Cuba
	</legend>";
	echo "<table style='border:2px black solid;color:#A80000;font-weight:bold;margin:5px;padding:5px;width:100%'>";
	$schools = getRowsNoSort("school","region","ddess");
	$counter = 0;
	while($row = mysqli_fetch_assoc($schools)){
		extract($row);
		
		if($counter%4 == 0){
			if($counter!== 0){
				echo "</tr>";
			}
			echo "<tr style='vertical-align:top'>";
		}
		$counter = $counter + 1;
		
		echo "
			<td style='border: 2px black solid;width:20%;max-width:200px;height:120px;background-color:white;text-align:center;font-size:small;vertical-align:bottom'>
				<input style='margin:0px;border:0px;' type='checkbox' value='".$school_id."' /> <span style='vertical-align:top'>&nbsp;".$school_name."</span><br/>
				<img style='width:95px;height:95px;' src='".$mascot_pic."' />
			</td>
		";
	}
	echo "</tr></table>";
	echo "</fieldset>";
	
	
	echo "<fieldset  style='color:#12146B' >
	<legend>
	DoDDS Europe
	</legend>";
	
	echo "<table style='border:0px black solid;color:#A80000;font-weight:bold;margin:5px;padding:5px;width:100%'>";
	$schools = getRowsNoSort("school","region","europe");
	$counter = 0;//include .$mascot_pic."' />
	while($row = mysqli_fetch_assoc($schools)){
		extract($row);
		
		if($counter%4 == 0){
			if($counter!== 0){
				echo "</tr>";
			}
			echo "<tr style='vertical-align:top;padding-bottom:15px;'>";
		}
		$counter = $counter + 1;
		
		echo "
			<td style='border: 0px black solid;width:20%;max-width:200px;height:120px;background-color:white;text-align:center;font-size:small;vertical-align:bottom;padding-bottom:15px;'>
				<input style='margin:0px;border:0px;' type='checkbox' value='".$school_id."' /> <span style='vertical-align:top'>&nbsp;".$school_name."</span><br/>
				<img style='width:95px;height:95px;' src='".$mascot_pic."' />
			</td>
		";
	}
	
	
	echo "</tr></table>";
	
	
	echo "</fieldset>";
	
	
	echo "<fieldset  style='color:#12146B' >
	<legend>
	DoDDS-Pacific/DDESS-Guam
	</legend>";
	
	echo "<table style='border:2px black solid;color:#A80000;font-weight:bold;margin:5px;padding:5px;'>";
	$schools = getRowsNoSort("school","region","pacific");
	$counter = 0;
	while($row = mysqli_fetch_assoc($schools)){
		extract($row);
		
		if($counter%4 == 0){
			if($counter!== 0){
				echo "</tr>";
			}
			echo "<tr style='vertical-align:top'>";
		}
		$counter = $counter + 1;
		
		echo "
			<td style='border: 2px black solid;width:20%;max-width:200px;height:120px;background-color:white;text-align:center;font-size:small;vertical-align:bottom'>
				<input style='margin:0px;border:0px;' type='checkbox' value='".$school_id."' /> <span style='vertical-align:top'>&nbsp;".$school_name."</span><br/>
				<img style='width:95px;height:95px;' src='".$mascot_pic."' />
			</td>
		";
	}
	echo "</tr></table>";
	
	
	echo "</fieldset>";
	
	echo "<input type='submit' value='Submit!' action='process_school_select.php' style='text-align:right'/>";
	
	
	echo "</form>";
	echo "<br/><div style='color:#12146B;text-align:center;font-style:bold;'>Don't see your school?<br/>";
	echo "<a class='infobar' href='generic.php?job=create_school' <span style='color:#12146B;font-variant:small-caps'>create the page</span></a></div>";
	
	/*
	echo "<form style='color:#12146B;font-weight:bold;margin:5px;padding:5px;border:0px black solid;margin-right:150px' action='process_registration.php' method='POST'>";
	echo "<table style='border:0px black solid;width:100%;text-align:right;'><tr><td>";
	echo "First name:<input style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' type='text' name='first_name' size='28' maxlength='25' value='";
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
	echo "  Password:<input type='password' style='margin:5px;text-align:center;padding:5px;border:2px #12146B solid;' name='pass1' size='28' maxlength='100'/><br/>\n";
	echo "  Confirm:<input type='password' style='margin:5px;padding:5px;border:2px #12146B solid;text-align:center;' name='pass2' size='28' maxlength='100'/><br/>\n";
	echo "  <input style='margin:5px;padding:5px;border:2px #12146B solid;color:#12146B;font-weight:bold;font-family:'Times New Roman',Serif;' type='submit' value='Register!'/>\n";
	*/
?>