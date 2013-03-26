<script type="text/javascript">
function add_job1(){
document.getElementById('job1').style.visibility = 'visible';
document.getElementById('job1').innerHTML =
'Position: <br/><input id=\"job_position_past_1\" name=\"job_position_past_1\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_1\" name=\"job_company_past_1\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  /> <br/><a  class=\"fake_button\"  id=\"add_job2\" style=\"visibility:visible\"  href=\"#anchor2\" onclick=\"add_job2()\">Add a job</a>';
document.getElementById('add_job1').style.visibility = 'hidden';
document.getElementById('add_job1').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}

function add_job2(){
document.getElementById('job2').style.visibility = 'visible';

document.getElementById('job2').innerHTML =
'Position: <br/><input id=\"job_position_past_2\" name=\"job_position_past_2\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_2\" name=\"job_company_past_2\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  /><br/><a id=\"add_job3\"  class=\"fake_button\"  style=\"visibility:visible\"  href=\"#anchor3\" onclick=\"add_job3()\">Add a job</a>';
document.getElementById('add_job2').innerHTML = '';
document.getElementById('add_job2').style.visibility = 'hidden';
//document.getElementById('fs1').innerHTML = '';
//document.getElementById('fs2').innerHTML = '</fieldset>';
}

function add_job3(){
document.getElementById('job3').style.visibility = 'visible';

document.getElementById('job3').innerHTML =
'Position: <br/><input id=\"job_position_past_3\" name=\"job_position_past_3\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_3\" name=\"job_company_past_3\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  />';
document.getElementById('add_job3').innerHTML = '';
document.getElementById('add_job3').style.visibility = 'hidden';
//document.getElementById('fs2').innerHTML = '';
//document.getElementById('fs3').innerHTML = '</fieldset>';
}

function edit_current(){
document.getElementById('edit_current').style.visibility = 'visible';
document.getElementById('edit_current').innerHTML =
"New recent picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
document.getElementById('edit_current_button').style.visibility = 'hidden';
document.getElementById('edit_current_button').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}

function edit_hs(){
document.getElementById('edit_hs').style.visibility = 'visible';
document.getElementById('edit_hs').innerHTML =
"New high school picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
document.getElementById('edit_hs_button').style.visibility = 'hidden';
document.getElementById('edit_hs_button').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}
</script>
<?php



function mailer($to, $from, $from_name, $subject, $body, $html) { 
	require_once('phpmailer/class.phpmailer.php');
	include('atlasshrugged.php');
	//echo $to."<br/>". $from."<br/>". $from_name."<br/>". $subject. "<br/>".$body. "<br/>".$html;
	global $error;
	$mail = new PHPMailer();  // create a new object
	echo "<br/>   Object created  ";
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPAuth = true;  // authentication enabled
	
	//if ($is_gmail) {
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;  
		$mail->Username = GUSER;  
		$mail->Password = GPWD;   
	/*} else {
		$mail->Host = SMTPSERVER;
		$mail->Username = SMTPUSER;  
		$mail->Password = SMTPPWD;
	}  */  
	

	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	
	$mail->AddAttachment("logorevised.jpg");      // attachment
	
	if($html){
		$mail->MsgHTML($body);
		$mail->IsHTML($html);
	//	echo " <br/>    Its html ";
	}else{
		$mail->Body($body);
		$mail->IsHTML(!$html);
	}
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
	//	echo "Failed";
		return false;
	}else{
		$error = 'Message sent!';
	//	echo "Success!";
		return true;
		}
}

function get($descriptor, $table, $identifier, $id_value){
			
			include('UncleJoesCookies.php');
			$cxn = mysqli_connect("localhost", "root","", "member")
				or die("Login failed.");
			mysqli_select_db($cxn, "member")
				or die("Database selectino failedx");
			$query= "Select $descriptor from $table where $identifier = '$id_value'" ;
			//echo $query;
			$result = mysqli_query($cxn, $query)
				or die("Query failed");
			$row = mysqli_fetch_assoc($result);
			return $row[$descriptor];
		
			}
			
	function execute($input_query){
	include('UncleJoesCookies.php');
	
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
		echo "<br/>database selected";
		echo "<br/>$input_query";
	$result = mysqli_query($cxn, $input_query)
		or die("Command failed: ".mysql_error());
	echo "<br/>successful execution.<br/>";
	}	


function executeNoLogin($connection, $input_query){
	
	echo "<br/>$input_query";
	$result = mysqli_query($connection, $input_query)
		or die("Command failed: ".mysql_error());
	echo "<br/>successful execution.<br/>";
	}
	
	
	function getRows($table, $identifier, $id_value, $sorter){
	include('UncleJoesCookies.php');
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failed.");
	//echo "db selected";
	$query= "Select * from $table where $identifier = '$id_value' order by $sorter";
	//echo $query;
	$result = mysqli_query($cxn, $query)
		or die(mysql_error());
	//	echo "success";
	return $result;	
}
	
	function getOrderedRows($table, $sorter, $order, $limit1, $limit2){
	include('UncleJoesCookies.php');
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failed.");
	//echo "db selected";
	$query= "Select * from $table order by $sorter $order ";
if(isset($limit1) and isset($limit2)){
	$query = $query." limit $limit1, $limit2";
	}
	//echo $query;
	$result = mysqli_query($cxn, $query)
		or die(mysql_error());
	//	echo "success";
	return $result;	
}	


	function getSpecificOrderedRows($table, $identifier, $id_value, $sorter, $order, $limit1, $limit2){
	include('UncleJoesCookies.php');
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failed.");
	//echo "db selected";
	$query= "Select * from $table where $identifier = '$id_value' order by $sorter $order ";
if(isset($limit1) and isset($limit2)){
	$query = $query." limit $limit1, $limit2";
	}
	//echo $query;
	$result = mysqli_query($cxn, $query)
		or die(mysql_error());
	//	echo "success";
	return $result;	
}



function getExtension($fn){
	global $size2;
	$size2 = getImageSize($fn);
	$extType2 = $size2[2];
	$extString2 = image_type_to_extension ($extType2,$include_dot = TRUE );
	$extension = strtolower($extString2);
	return $extension;
}

function manage($file_name, $min_width, $max_width, $name){
		//echo "$file_name";
		//$file = "\\bl_".get("school_id","school","school_name","".$_POST['school_name'])."_school";  
		$extension = getExtension($file_name);
		//echo "<br/> Set:".$extension;
		$uploadedfile = $file_name;		
		if($extension==".jpg" || $extension==".jpeg" )
		{
		$src = imagecreatefromjpeg($uploadedfile);
		}else if($extension==".png"){
		$src = imagecreatefrompng($uploadedfile);
		}else{
		$src = imagecreatefromgif($uploadedfile);
      }
	 // echo "<br/> image created";

	$sizes = getImageSize($file_name);
	$width = $sizes[0];
	//echo $width;
	$height = $sizes[1];
	//echo $height;
	$new_width = $width;
	$new_height = $height;
	
	while($new_width > $max_width){
		$new_width = round(.9 * $new_width,-1);
		$new_height = round(.9 * $new_height,-1);
		//echo "<br/>Width: ".$new_width;
		//echo "<br/>Height: ".$new_height;
	  }
	  while($new_width < $min_width){
		$new_width = round(1.1 * $new_width , -1);
		$new_height = round(1.1 * $new_height, -1);
		//echo "<br/>Width: ".$new_width;
		//echo "<br/>Height: ".$new_height;
	  }
	  
	 $tmp = imagecreatetruecolor($new_width,$new_height);
	 //echo "<br/> field created..";
	 imagecopyresampled($tmp,$src,0,0,0,0,$new_width,$new_height,$width,$height);
	 // echo "<br/> imagecopyresampled..";
	 imagejpeg($tmp,UPLOAD_DIR.$name.".jpg",100);
	 echo "imagejpeg($tmp,".UPLOAD_DIR.$name.".jpg,100)";
	 // echo "<br/> imagejpeg..";
	 return $name.".jpg";
}
	  
function generatePassword ($length)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }
	
	return $password;
	}
	
	
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
	

function isValidInetAddress($data, $strict = false) 
{ 
  $regex = $strict? 
      '/^([.0-9a-z_-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i' : 
       '/^([*+!.&#$¦\'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i' ; 
  if (preg_match($regex, trim($data), $matches)) { 
    return array($matches[1], $matches[2]); 
  } else { 
    return false; 
  } 
}


	  
/*
<script type="text/javascript">
function add_school(var1)
{
document.write(


)
}
</script>

function get($descriptor, $table, $identifier, $id_value){
	include('UncleJoesCookies.php');
	
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
	
	$query= "Select $descriptor from $table where $identifier ='$id_value'";
		$result = mysqli_query($cxn, $query)
	or die(" $descriptor Query failed");
		$row = mysqli_fetch_assoc($result);
	return $row[$descriptor];
	}
	
//retrieves all the rows in a table that possess a value of $id_value for  column $identifier
function getRows($table, $identifier, $id_value){
	include('UncleJoesCookies.php');
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failed.");
	
	$query= "Select * from $table where $identifier = '$id_value'";
	$result = mysqli_query($cxn, $query)
		or die(mysql_error());
		
	}
	
//executes a query, inputted as a string
function execute($input_query){
	include('UncleJoesCookies.php');
	echo "Executing...";
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die(mysql_error());
	echo "Connection made...  ";
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
	$result = mysqli_query($cxn, $input_query)
		or die(mysql_error());
	echo "Success!!";
	}
	


*/
?>