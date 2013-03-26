<?php

	
	include('UncleJoesCookies.php');

	session_start();
	unset($_FILES);
$_SESSION['member_index']=31;
	echo "<span style='font-size:2em; text-decoration:underline;text-align:center;color:#12146B;'>Create School</span>\n";
	if($_SESSION['prof_error'] == 'true'){
		echo "<div style='color:black;border:0px orange solid;padding:10px;font-weight:bold;background-color:pink'><ul>";
		if(isset($_SESSION['blank_fields'])){
			echo "<li>You did not enter a value for: ".$_SESSION['blank_fields']."</li>";
		}if(isset($_SESSION['format_incorrect_prof'])){
			echo "<li>The ".$_SESSION['format_incorrect_prof']." contain invalid characters.</li>";
		}if(isset($_SESSION['upload_error_prof_1'])){
			echo "<li>".$_SESSION['upload_error_prof_1']."</li>";
		}if(isset($_SESSION['upload_error_prof_2'])){
			echo "<li>".$_SESSION['upload_error_prof_2']."</li>";
		}
		
		echo "</ul></div>";
	}
	
	
	echo "<form enctype='multipart/form-data' style='color:#A80000;font-weight:bold;margin:5px;padding:5px;border:0px black solid;' action='process_update_profile.php' method='POST'>";
	
	echo "<table style='border:2px black solid;width:100%;text-align:right;'>";
	echo "<tr>";
	
	echo "<td valign='top' style='text-align:right;width:45%;border:2px black solid;padding-right:5px;padding-bottom:5px'>\n";
	
	
	//echo "<fieldset  style='width:auto;height:auto;text-align:right'>";
	//echo "<legend>";
	echo "<div class='fieldset_title' >Education</div><br/><br/>";
	//echo "</legend>";
	echo "<ul><li>";
	echo "<div style='color:#A80000;line-height:.8;font-size:small;font-weight:bold;text-align:left'>This information will be publicly visible to all on your profile.</div><br/>";
	echo "</li><li>";
	echo "<div style='color:#A80000;line-height:.8;font-size:small;font-weight:bold;text-align:left'>To change your high school(s) press the back button on your browser.</div><br/>";
	echo "</li></ul>";
	
	echo "High School(s):<input type='text' readonly='readonly' name='school_name_1' id='school_name' size='28' maxlength='28' style='border:2px #12146B solid;color:grey' value='";
		if(isset($_SESSION['school_name_1'])){
		echo $_SESSION['school_name_1'];}
	echo "'/> <br/>";
	
	if(isset($_SESSION['school_name_2'])){
	echo "<input type='text' readonly='readonly' name='school_name_2' id='school_name_2' size='28' maxlength='28' style='border:2px #12146B solid;color:grey' value='";
		echo $_SESSION['school_name_2'];
	echo "'/> <br/>";}
	
	if(isset($_SESSION['school_name_3'])){
	echo "<input type='text' readonly='readonly' name='school_name_3' id='school_name_3' size='28' maxlength='28' style='border:2px #12146B solid;color:grey' value='";
		echo $_SESSION['school_name_3'];
	echo "'/> <br/>";}
	
	if(isset($_SESSION['school_name_4'])){
	echo "<input type='text' readonly='readonly' name='school_name_4' id='school_name_4' size='28' maxlength='28' style='border:2px #12146B solid;color:grey' value='";
		echo $_SESSION['school_name_4'];
	echo "'/> <br/>";
	}
	
	include('class_of_options.php');
	
	echo "
		<br/>
	Undergraduate college:<input type='text' name='undergrad_college' id='undergrad_college' size='28' maxlength='28' style='border:2px #12146B solid;background-color:LightGrey' value='";
		if(isset($_SESSION['ug'])){
		echo $_SESSION['ug'];}
	echo "'/> <br/>";
	
	
		echo "Further education:<br/><textarea name='gen_ed' id='gen_ed' cols='30' rows='4'  style='resize:none;border:2px #12146B solid;background-color:LightGrey;text-align:left' >";
			if(isset($_SESSION['fed'])){
			echo $_SESSION['fed'];
			}
		echo "</textarea><br/>";
	
	
	echo "</td>";
	
	//Table data break
	
	echo "<td valign='top' style='text-align:right;width:45%;border:2px black solid;padding-right:5px;padding-bottom:5px'>";
	
	
	echo "<div class='fieldset_title' >Address</div><br/><br/>";
	//<span style='vertical-align:middle;font-size:1.2em;color:grey'>(Optional, but recommended)</span><br/><br/>";
	
	/*echo "Town/city: <input type='text' name='city' id='city' size='28' maxlength='30' style='border:2px #12146B solid;'value='";
		if(isset($_SESSION['tn'])){
		echo $_SESSION['tn'];}
	echo "'/><br/>\n";*/

echo '
Street address: <input id="address_1" name="address_1" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['ad1'])){
		echo $_SESSION['ad1'];}
	echo '"  />';

echo "<br/>";	

echo '
Address Line 2: <input id="address_2" name="address_2" type="text"  style="border:2px #12146B solid;background-color:LightGrey" size="28" maxlength="50"  value="';
		if(isset($_SESSION['ad2'])){
		echo $_SESSION['ad2'];}
	echo '"  />';
	
	echo "<br/>";	
	
echo '
City: <input id="city" name="city" type="text"  style="border:2px #12146B solid;" size="28" maxlength="50" value="';
		if(isset($_SESSION['cy'])){
		echo $_SESSION['cy'];}
	echo '"  />';

	echo "<br/>";	
	
echo '
State/Region: <input id="state" name="state" type="text"  style="border:2px #12146B solid;" size="28" maxlength="50" value="';
		if(isset($_SESSION['st'])){
		echo $_SESSION['st'];}
	echo '"  />';
	
	echo "<br/>";	
	
echo '
Zip/Postal Code: <input id="zip" name="zip" type="text"  style="border:2px #12146B solid;" size="28" maxlength="50" value="';
		if(isset($_SESSION['zip'])){
		echo $_SESSION['zip'];}
	echo '"  />';
	
echo "<br/>";	
	
include('country_options.php');
	
echo '
<br/>
Phone Number: <input id="phone_number" name="phone_number" type="text" size="28" style="border:2px #12146B solid;" maxlength="20" value="';
		if(isset($_SESSION['pn'])){
		echo $_SESSION['pn'];}
	echo '"  />';

	echo "</td>";
	
	echo "</tr>";
	
	echo '<tr>
	
		<td valign="top" style="border:2px black solid;padding-right:5px;padding-bottom:5px;padding-top:0px" rowspan = "2" >
		
		<div style="padding-top:0px" class="fieldset_title">Profession</div><br/><br/>';
		
echo "<ul><li>";
	echo "<div style='color:#A80000;line-height:.8;font-size:small;font-weight:bold;text-align:left'>If a student, enter 'Student' and your university's name.</div><br/>";
	echo "</li><ul>";
	
echo '<fieldset style="margin-left:-48px;float:left;width:100%">
<legend>Current Work</legend><center>
Position: <br/><input id="job_position" name="job_position" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['pos'])){
		echo $_SESSION['pos'];}
	echo '"  /><br/>



Company/employer:<br/> <input id="job_company" name="job_company" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['com'])){
		echo $_SESSION['com'];}
	echo '"  />

<br/></center>
</fieldset>
<fieldset style="margin-left:-48px;float:left;width:100%"><legend>Past Work</legend><center>
';


//$job1 = get("job_company_past_2","profile","member_index","".$_SESSION['member_index']);
if(!isset($_SESSION['posp1'])){
	echo '<a name="anchor1" id="anchor1"></a>
	<div style="visibility:hidden" id="job1">
	</div>
	<a class="fake_button" id="add_job1" style="visibility:visible;" href="#anchor1" onclick="add_job1()">Add previous job</a>';
	
	//echo "<div id='fs1'></div>";
	//add copied version
}else{

echo '
Position: <br/><input id="job_position_past_1" name="job_position_past_1" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['posp1'])){
		echo $_SESSION['posp1'];}
	echo '"  />


<br/>
Company/employer: <br/><input id="job_company_past_1" name="job_company_past_1" style="border:2px #12146B solid" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['comp1'])){
		echo $_SESSION['comp1'];}
	echo '"  />
<br/>
';
}	
if(!isset($_SESSION['posp2'])){
	echo '<a name="anchor2" id="anchor2"></a>
	<div style="visibility:hidden" id="job2">
	</div>';
	//<div id="fs2"></div>
	
}else{
	echo '
		<br/>Position: <br/><input id="job_position_past_2" name="job_position_past_2" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['posp2'])){
		echo $_SESSION['posp2'];}
	echo '"  /><br/>';

echo '
Company/employer: <br/><input id="job_company_past_2" name="job_company_past_2" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['comp2'])){
		echo $_SESSION['comp2'];}
	echo '" /><br/>';
}

	
if(!isset($_SESSION['posp3'])){
	echo '<a name="anchor3" id="anchor3"></a>
	<div style="visibility:hidden" id="job3">
	</div>';
	//<div id="fs3"></div>
	
}else{
	echo '
		<br/>Position: <br/><input id="job_position_past_3" name="job_position_past_3" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['posp3'])){
		echo $_SESSION['posp3'];}
	echo '"  /><br/>';

echo '
Company/employer: <br/><input id="job_company_past_3" name="job_company_past_3" style="border:2px #12146B solid;" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['comp3'])){
		echo $_SESSION['comp3'];}
	echo '" /><br/>';
	
}
	
	/*	
	echo '<a name="anchor3" id="anchor3"></a>
<div style="visibility:hidden" id="job3">
</div>
<a id="add_job3" href="#anchor3" onclick="add_job3()">Add a job</a>';
	
	
}else{
	echo '
		Position: <br/><input id="job_position_past_2" name="job_position_past_2" style="border:2px #12146B solid;background-color:LightGrey" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['posp2'])){
		echo $_SESSION['posp2'];}
	echo '"  /><br/>';

echo '
Company/employer: <br/><input id="job_company_past_2" name="job_company_past_2" style="border:2px #12146B solid;background-color:LightGrey" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['comp2'])){
		echo $_SESSION['comp2'];}
	echo '" />';
}

	
	
	
}else{

echo '
Position: <br/><input id="job_position_past_1" name="job_position_past_1" style="border:2px #12146B solid;background-color:LightGrey" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['posp1'])){
		echo $_SESSION['posp1'];}
	echo '"  />


<br/>
Company/employer: <br/><input id="job_company_past_1" name="job_company_past_1" style="border:2px #12146B solid" size="28" maxlength="50" type="text" value="';
		if(isset($_SESSION['comp1'])){
		echo $_SESSION['comp1'];}
	echo '"  />

';

}

echo "</center></fieldset>";
//$job2 = get("job_company_past_2","profile","member_index","".$_SESSION['member_index']);


//$job3 = get("job_company_past_3","profile","member_index","".$_SESSION['member_index']);

*/
?>


		</td>
		<td valign="top" style="border:2px black solid;padding-right:5px;padding-bottom:5px">
			<div class="fieldset_title" >Profile Pictures</div><br/><br/>
			<!--<ul><li>
			<div style='color:#A80000;line-height:.8;font-size:small;font-weight:bold;text-align:left'>If you are filling out your profile for the first time, you must choose pictures to upload.</div><br/>
			</li><li>
			<div style='color:#A80000;line-height:.8;font-size:small;font-weight:bold;text-align:left'>If you wish t.</div><br/>
			</li></ul>-->
			<?php
			if(get("current_picture","profile","member_index","".$_SESSION['member_index']) == null){
				echo "Recent picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
			}else{
				echo '
				<table>
				<tr>
				<td>
				<img style="width:35px;height:35px;margin:15px;" src="'.get("current_picture","profile","member_index","".$_SESSION['member_index']).'"/>
				</td><td>
				<a name="anchor4" id="anchor4"></a>
				<div style="visibility:hidden" id="edit_current">
				</div>
				<a class="fake_button" id="edit_current_button" style="visibility:visible;" href="#anchor4" onclick="edit_current()">Edit recent picture</a></td></tr>';
			}
			if(get("hs_picture","profile","member_index","".$_SESSION['member_index']) == null){
				echo "High school picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
			}else{
				echo '
				<tr><td>
				<img style="width:35px;height:35px;margin:15px" src="'.get("hs_picture","profile","member_index","".$_SESSION['member_index']).'"/>
				</td><td><a name="anchor5" id="anchor5"></a>
				<div style="visibility:hidden" id="edit_hs">
				</div>
				<a class="fake_button" id="edit_hs_button" style="visibility:visible;" href="#anchor5" onclick="edit_hs()">Edit high school picture</a>
				</td></tr></table>
				';
			}
			//echo "High school picture:<br/><input type='file' name='hs_picture' style='border:2px #12146B solid;' id='hs_picture' size='28' maxlength='100' /><br />";
			?>
	
		</td>
	</tr>
	
	<tr>
		<td valign="top" style="border:2px black solid;padding-right:5px;padding-bottom:5px">
		<div class="fieldset_title" >Preferences</div><br/><br/>
	<?php		
	echo "<center>
	<fieldset style='width:70%;text-align:right'>
	<legend>Make address available:</legend>";
	
	if(isset($_SESSION['ps'])){
	if($_SESSION['ps']==1){
		echo "on request<input type='radio' name='privacy_setting' checked='checked' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting' value='4' /><br/>
			";
	}else if ($_SESSION['ps']==2){
		echo "
			on request<input type='radio' name='privacy_setting' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting' checked='checked' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting' value='4' /><br/>";
	}else if ($_SESSION['ps']==3){
		echo "
			on request<input type='radio' name='privacy_setting' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting'value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting'  checked='checked' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting' value='4' /><br/>";
	}else if ($_SESSION['ps']==4){
		echo "
			on request<input type='radio' name='privacy_setting' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting' value='4' checked='checked' /><br/>";
	}
	}else{
		echo "
			on request<input type='radio' name='privacy_setting' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting' value='3' /><br/>
			to all<input type='radio' checked='checked' name='privacy_setting' value='4'  /><br/>";
	}

echo "	
	</fieldset></center>
	<br/><br/>
";	


	/*	echo "<center>
	<fieldset style='width:70%;text-align:right'>
	<legend>Make email available:</legend>";
	
	if(isset($_SESSION['ps2'])){
	if($_SESSION['ps2']==1){
		echo "on request<input type='radio' name='privacy_setting_2' checked='checked' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting_2' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting_2' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting_2' value='4' /><br/>
			";
	}else if ($_SESSION['ps2']==2){
		echo "
			on request<input type='radio' name='privacy_setting_2' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting_2' checked='checked' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting_2' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting_2' value='4' /><br/>";
	}else if ($_SESSION['ps2']==3){
		echo "
			on request<input type='radio' name='privacy_setting_2' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting_2'value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting_2'  checked='checked' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting_2' value='4' /><br/>";
	}else if ($_SESSION['ps2']==4){
		echo "
			on request<input type='radio' name='privacy_setting_2' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting_2' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting_2' value='3' /><br/>
			to all<input type='radio' selected='selected' name='privacy_setting_2' value='4' checked='checked' /><br/>";
	}
	}else{
		echo "
			on request<input type='radio' name='privacy_setting_2' value='1' /><br/>
			to members of my graduating class<input type='radio' name='privacy_setting_2' value='2' /><br/>
			to alumni of my school(s)<input type='radio' name='privacy_setting_2' value='3' /><br/>
			to all<input type='radio' checked='checked' name='privacy_setting_2' value='4'  /><br/>";
	}
	
echo "	
	</fieldset></center>
	<br/>
";*/


?>
<a class='click' target='_blank' href='generic.php?job=info_request_info'>(more details)</a>
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2" valign="top" style="border:2px black solid;padding-right:5px;padding-bottom:5px">
		<div class="fieldset_title" >Save Changes</div><br/><br/>
			<?php
echo "<br/><center>You will be able to edit all this information at any time!<br/>";
echo "<a target='_blank' style='hover:text-decoration:underline;color:#12146B' href='generic.php?job=admin_responsibilities' >What are the responsibilities of an admin?<a><br/>";
echo "<span style='font-size:small'>(will open in a new tab or window)</span>";
echo "<br/>	<input class='button' style='font-family: times,Serif;font-weight:bold;color:white' type='submit' value='Save Changes!'/>\n</center>";
?>

		</td>
	</tr>
</table>

</form>

