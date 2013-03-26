<?php
include('functions.php');
?>
<?php
	include('UncleJoesCookies.php');

	session_start();

//unset all error messages from previous attempt, if there is one
unset($_SESSION['sch_error']);
unset($_SESSION['password_mismatch']);
unset($_SESSION['format_incorrect']);
unset($_SESSION['city_exists']);
unset($_SESSION['base_exists']);
unset($_SESSION['site_exists']);
unset($_SESSION['field_blank']);
unset($_SESSION['school_site_no_exist']);
unset($_SESSION['network_site_no_exist']);
unset($_SESSION['upload_error']);
unset($_SESSION['upload_error2']);


//	set defaults
	//echo "setting defaults...";
	
	
	$_SESSION['sn']= $_POST['school_name'];
	$_SESSION['ms']= $_POST['mascot'];
	$_SESSION['tn']= $_POST['city'];
	if($_POST['country'] !== "") $_SESSION['cn']= $_POST['country'];
	$_SESSION['url1']= $_POST['school_website'];
	$_SESSION['url2']= $_POST['network_website'];
	$_SESSION['base1']= $_POST['base1'];
	$_SESSION['base2']= $_POST['base2'];
	$_SESSION['base3']= $_POST['base3'];
	$_SESSION['region'] = $_POST['region'];

	
	//check names for improper format
	//echo "Checking format...";
	if(!preg_match("/^[A-Za-z' -]{1,50}$/",$_POST['school_name'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[school name]&nbsp;";
		//echo "school name wrong";
		//echo $_POST['school_name'];
	}	if(!preg_match("/^[A-Za-z' -]{1,50}$/",$_POST['mascot'])){
		$_SESSION['reg_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[mascot]&nbsp;";
		//echo "mascot wrong";
		//echo $_POST['mascot'];

	}if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['city'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[town/city]&nbsp;";
		//echo "city wrong";
	}if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['state'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[state/region]&nbsp;";
		//echo "city wrong";
	}//if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['country'])){
	//	$_SESSION['sch_error']="true";
		//if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
	//	$_SESSION['format_incorrect'] .= "&nbsp;[country]&nbsp;";
	//	//echo "country wrong";
	//}if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['base1'])){
	//	$_SESSION['sch_error']="true";
	//	if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
	//	$_SESSION['format_incorrect'] .= "&nbsp;[base #1]&nbsp;";
	//	echo "base wrong";
//	}
	if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['base2'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[base #2]&nbsp;";
		//echo "country wrong";
	}if(!preg_match("/^[A-Za-z)(' -]{0,50}$/",$_POST['base3'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[base #3]&nbsp;";
		//echo "country wrong";
	}
	
if(!empty($_POST['school_website'])){
	if(!preg_match("_(^|[\s.:;?\-\]<\(])(https?://[-\w;/?:@&=+$\|\_.!~*\|'()\[\]%#,?]+[\w/#](\(\))?)(?=$|[\s',\|\(\).:;?\-\[\]>\)])_i",$_POST['school_website'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[school website URL]&nbsp;";
		//echo "country wrong";
	}else{
		$_SESSION['sch_error']='true';
		$_SESSION['format_incorrect'] .="&nbsp;[school website]&nbsp;";
	}}
	
	
	
	
	if(!empty($_POST['network_website'])){
	if(!preg_match("_(^|[\s.:;?\-\]<\(])(https?://[-\w;/?:@&=+$\|\_.!~*\|'()\[\]%#,?]+[\w/#](\(\))?)(?=$|[\s',\|\(\).:;?\-\[\]>\)])_i",$_POST['network_website'])){
		$_SESSION['sch_error']="true";
		if(!isset($_SESSION['format_incorrect'])) $_SESSION['format_incorrect']=" ";
		$_SESSION['format_incorrect'] .= "&nbsp;[existing alumni site URL]&nbsp;";
		//echo "country wrong";
	}else{
		$_SESSION['sch_error']='true';
		$_SESSION['format_incorrect'] .="&nbsp;[alumni website]&nbsp;";
	}}
	
	

	
	//testing if username exists
	//echo "Checking for city double...";
	$city = strip_tags(trim($_POST['city']));
	$check_exists = get('city','school','city',''.$city);
	if(isset($check_exists)){
		$_SESSION['reg_error']="true";
		$_SESSION['city_exists'] = "An school is already created in this city.";
		//echo "city exists already";
	}
	
		//echo "Checking for base double...";
	$base_check = strip_tags(trim($_POST['base1']));
	$check_exists = get('base1','school','city',''.$base_check);
	if(isset($check_exists)){
		$_SESSION['reg_error']="true";
		$_SESSION['base_exists'] = "A school is already created that serves this base.  Please press the bac button and check the listed schools again.";
		//echo "city exists already";
	}
	
	//testing if username exists
	//echo "Checking for website double...";
	$school_website = strip_tags(trim($_POST['school_website']));
	$check_exists = get('school_website','school','city',''.$school_website);
	if(isset($check_exists)){
		$_SESSION['reg_error']="true";
		$_SESSION['site_exists'] = "A school is already created with this website.";
		//echo "site exists already";
	}
	
	//check for empty values
	//echo "Checking for empty values...";
	if(empty($_POST['school_name']) or empty($_POST['city']) or empty($_POST['state']) or empty($_POST['base1']) or empty($_POST['mascot']) or empty($_POST['country'])){
		$_SESSION['sch_error']="true";
		$_SESSION['field_blank'] = "You left one or more fields blank.";
	
		//echo "field blank";
	}
	
	//redirect after error testing
	if(isset($_SESSION['sch_error'])){
		//echo "Redirect to page, showing  errors";
		header("Location: generic.php?job=create_school");
	}
	
	
	

// define a constant for the maximum upload size
define ('MAX_FILE_SIZE', 1024 * 150);	
ini_set('upload_max_filesize',MAX_FILE_SIZE) ;

//TESTS UPLOADED IMAGE 1
// define constant for upload folder
  define('UPLOAD_DIR', '/Applications/XAMPP/xamppfiles/htdocs/images/');

// TESTING IMAGE 1

//  maximum upload size already defined above
//echo "<br/> Strart testing image 1";
if (array_key_exists('school_picture', $_FILES)) {

	$rows = getOrderedRows("school", "school_id","desc", "0", "1");
	while ($row = mysqli_fetch_assoc($rows)){
		$si = $row['school_id'] +1;
		//echo $si;
	}

  // create filename
  $file2 = "school/dn_".$si."_school";  //str_replace(' ', '_', $_FILES['school_picture']['name']);
  $name2 = "images/school/dn_".$si."_school.jpg";
  //echo "Uploading..." .UPLOAD_DIR . $file2.".jpg";
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png','');
  
  $errors = $_FILES['school_picture']['error'];
 
  // check if a file of the same name has been uploaded
        if (file_exists(UPLOAD_DIR . $file2.".jpg")) {
			$date = date('h-i-s--j-m-y');
			rename(UPLOAD_DIR . $file2.".jpg" , UPLOAD_DIR . $file2 .$date.".jpg");
			
			}
          // move the file to the upload folder and rename it
	
    switch($_FILES['school_picture']['error']) {
      case 0:
	  
        $mn = 600;
		$mx = 700;
		manage($_FILES['school_picture']['tmp_name'], $mn, $mx, $file2);
		$school_picture = $name2;//
		//echo "<br/> Uploaded image: ".$school_picture;
        /*
        if ($success) {
          //echo "$file2 uploaded successfully.";
        } else {
          $_SESSION['sch_error']= "true";
		  $_SESSION['upload_error2'] = "Error uploading mascot picture. Please try again.";
		  //echo $_SESSION['upload_error2'];
        }*/
        break;
	case 1:
		$_SESSION['sch_error']= "true";
		$_SESSION['upload_error1'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
		//echo "Error 2";
		break;
	case 2:
		$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			//echo "Error 2";
			break;
      case 3:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file was only partially uploaded. ";
			//echo "Error 3";
			break;
      case 4:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "You didn't select a file to be uploaded.";
		//echo "Error 4";
		//echo $_SESSION['upload_error2'];
		break;
	case 6:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Missing a temporary folder.";
			//echo "Error 6";
			break;
      case 7:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Failed to write file to disk. ";
			//echo "Error 7";
			break;
      case 8:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "A PHP extension stopped the file upload. ";
		//echo  $_SESSION['upload_error2'];
		//echo "Error 8";
        break;
      
    }
  
}else{
	$_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "Upload failure. Please report to the webmaster email address given below.";
}


// TESTING IMAGE 2


//  maximum upload size already defined above
//echo "<br/> Strart testing image 2";
if (array_key_exists('mascot_picture', $_FILES)) {

	$rows = getOrderedRows("school", "school_id","desc", "0", "1");
	while ($row = mysqli_fetch_assoc($rows)){
		$si = $row['school_id'] +1;
		//echo $si;
	}

  // make file name
  $file = "mascot/dn_".$si."_mascot";  //str_replace(' ', '_', $_FILES['mascot_picture']['name']);
  $name = "images/mascot/dn_".$si."_mascot.jpg";
//echo "Uploading..." .UPLOAD_DIR . $file.".jpg";  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png','');
  
  $errors = $_FILES['mascot_picture']['error'];

  // check if a file of the same name has been uploaded
        if (file_exists(UPLOAD_DIR . $file.".jpg")) {
			$date = date('h-i-s--j-m-y');
			rename(UPLOAD_DIR . $file.".jpg" , UPLOAD_DIR . $file .$date.".jpg");
			
		}
          // move the file to the upload folder and rename it
	
    switch($_FILES['mascot_picture']['error']) {
      case 0:
	  
        $mn = 75;
		$mx = 100;
		manage($_FILES['mascot_picture']['tmp_name'], $mn, $mx, $file);
		$mascot_picture = $name;//
		//$success = move_uploaded_file($image, UPLOAD_DIR .$file);
		//$mascot_picture = UPLOAD_DIR .$file;
		//echo "<br/> Uploaded image: ".$mascot_picture;
        /*
        if ($success) {
          //echo "$file uploaded successfully.";
        } else {
          $_SESSION['sch_error']= "true";
		  $_SESSION['upload_error2'] = "Error uploading mascot picture. Please try again.";
		  //echo $_SESSION['upload_error2'];
        }*/
        break;
		case 1:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error1'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			//echo "Error 2";
			break;
	case 2:
		$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			//echo "Error 2";
			break;
      case 3:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file was only partially uploaded. ";
			//echo "Error 3";
			break;
      case 4:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "You didn't select a file to be uploaded.";
		//echo "Error 4";
		//echo $_SESSION['upload_error2'];
		break;
	case 6:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Missing a temporary folder.";
			//echo "Error 6";
			break;
      case 7:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Failed to write file to disk. ";
			//echo "Error 7";
			break;
      case 8:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "A PHP extension stopped the file upload. ";
		//echo  $_SESSION['upload_error2'];
		//echo "Error 8";
        break;
      
    }
  
}else{
	$_SESSION['sch_error']= "true";
	$_SESSION['upload_error2'] = "Upload failure. Please report to the webmaster email address given below.";
}

	
	//redirect after error testing
	if(isset($_SESSION['sch_error'])){
		//echo "Redirect to page, showing  errors";
		//header("Location: generic.php?job=create_school");
	}
	
	//clean data and set intermediary variables
	
	$school_name = ucwords(strip_tags(trim($_POST['school_name'])));
	$city = ucwords(strip_tags(trim($_POST['city'])));
	$state = ucwords(strip_tags(trim($_POST['state'])));
	$base1 = ucwords(strip_tags(trim($_POST['base1'])));
	if(isset($_POST['base2'])){
		$base2 = ucwords(strip_tags(trim($_POST['base2'])));
	}else{
		$base2 = "";
	}
	if(isset($_POST['base3'])){
		$base3 = ucwords(strip_tags(trim($_POST['base3'])));
	}else{
		$base3 = "";
	}
	$region = strip_tags(trim($_POST['region']));
	$mascot = ucwords(strip_tags(trim($_POST['mascot'])));
	$country = strip_tags(trim($_POST['country']));
	//school_website already exists
	$network_website = strip_tags(trim($_POST['network_website']));

	$admin_member_index = get("member_index","memberregistration","email_address","".$_SESSION['email_address']);
	$mascot_picture = addslashes($mascot_picture);
	$school_picture = addslashes($school_picture);
	
	//echo "Data trimmed and tags stripped.";
	$query = "insert into school (school_name,city,state,base1,base2,base3,region,mascot,country,school_website,network_website,school_pic,mascot_pic,admin_member_index,school_id) values ('$school_name','$city','$state','$base1','$base2','$base3','$region','$mascot','$country','$school_website','$network_website','$school_picture','$mascot_picture','$admin_member_index','$si')";
	execute($query);
	//echo "school created";


	//$member_index = get("member_index","memberregistration","email_address","$email_address");
	//echo "mi retrieved";
	//$db_school = get("school_name","profile","member_index","$member_index");
	//echo "school retrieved";
	//		$_SESSION['member_index']=$member_index;
	//		$_SESSION['logged_in'] = "true";
	//		$_SESSION['email_address'] = $email_address;
	//		$_SESSION['login_result'] = "Redirect failed";
	//echo "Session vars created.  Logged in variable set to ".$_SESSION['logged_in'];
	
	/*
	$mascot_pic = get("mascot_pic","school","school_name","$school_name");
	$size1 = getImageSize($mascot_pic);
	$extType = $size1[2];
	$extString = image_type_to_extension ($extType,$include_dot = TRUE );
	$mascot_format = UPLOAD_DIR."\\bl_".get("school_id","school","school_name","".$school_name)."_mascot_".get("mascot_pic_index","school","school_name","".$school_name).$extString;
	// "<br/>MF:  $mascot_format";
	rename($mascot_picture, $mascot_format);
	$change_name = "update school set mascot_pic = '$mascot_format' where school_name = '$school_name'";
	execute($change_name);
	$num = get("mascot_pic_index","school","school_name","".$school_name) + 1;
	echo "<br/> $num";
	$query = "update school set mascot_pic_index = '$num' where school_name = '$school_name'";
	echo $query;
	execute($query);
	
	$size2 = getImageSize(get("school_pic","school","school_name","".$school_name));
	$extType2 = $size2[2];
	$extString2 = image_type_to_extension ($extType2,$include_dot = TRUE );
	$school_format = UPLOAD_DIR."\\bl_".get("school_id","school","school_name","".$school_name)."_school".get("school_pic_index","school","school_name","".$school_name).$extString;
	rename($school_picture, $school_format);
	$change_name = "update school set school_pic = '$school_format' where school_name = '$school_name'";
	execute($change_name);
	$num2 = get("school_pic_index","school","school_name","".$school_name) + 1;
	$query2 = "update school set school_pic_index = '$num' where school_name = '$school_name'";
	execute($query2);
	$change_name = "update school set school_pic = '$num' where school_name = '$school_name'";
	*/
	header("Location: generic.php?job=school_select");

?>