<?php
error_reporting(E_ALL);

include('functions.php');

	include('UncleJoesCookies.php');

	session_start();

//unset all error messages from previous attempt, if there is one
unset($_SESSION['prof_error']);
unset($_SESSION['format_incorrect_prof']);
unset($_SESSION['blank_fields']);
unset($_SESSION['upload_error_prof_1']);
unset($_SESSION['upload_error_prof_2']);


	//set defaults
	echo "setting defaults...";
	
	$keys = array_keys($_POST);
	/*foreach($keys as $key){
	
		$_SESSION[$key] = $_POST[key];
	
	}*/
	
	$_SESSION['school_name_1']= $_POST['school_name_1'];
	if(isset($_POST['school_name_2'])){
		$_SESSION['school_name_2']= $_POST['school_name_2'];}
	if(isset($_POST['school_name_3'])){$_SESSION['school_name_3']= $_POST['school_name_3'];}
	if(isset($_POST['school_name_4'])){$_SESSION['school_name_4']= $_POST['school_name_4'];}
	$_SESSION['co']= $_POST['class_of'];
	$_SESSION['ug']= $_POST['undergrad_college'];
	$_SESSION['fed']= $_POST['gen_ed'];
	$_SESSION['ps']= $_POST['privacy_setting'];
	if(isset($_POST['privacy_setting_2'])){$_SESSION['ps2']= $_POST['privacy_setting_2'];}
	$_SESSION['ad1']= $_POST['address_1'];
	if(isset($_POST['address_2'])){$_SESSION['ad2']= $_POST['address_2'];}
	$_SESSION['cy']= $_POST['city'];
	$_SESSION['st']= $_POST['state'];
	$_SESSION['zip']= $_POST['zip'];
	if($_POST['country'] !== "") $_SESSION['country'] = $_POST['country'];
	$_SESSION['pn'] = $_POST['phone_number'];
	$_SESSION['pos'] = $_POST['job_position'];
	$_SESSION['com'] = $_POST['job_company'];
	if(isset($_POST['job_company_past_1'])){$_SESSION['posp1'] = $_POST['job_company_past_1'];}
	if(isset($_POST['job_position_past_1'])){$_SESSION['comp1'] = $_POST['job_position_past_1'];}
	if(isset($_POST['job_company_past_2'])){$_SESSION['posp2'] = $_POST['job_company_past_2'];}
	if(isset($_POST['job_position_past_2'])){$_SESSION['comp2'] = $_POST['job_position_past_2'];}
	if(isset($_POST['job_company_past_3'])){$_SESSION['posp3'] = $_POST['job_company_past_3'];}
	if(isset($_POST['job_position_past_3'])){$_SESSION['comp3'] = $_POST['job_position_past_3'];}


	
	

	
//check names for improper format
	echo "Checking format...";
	if(!preg_match("/^[A-Za-z0-9' -]{0,150}$/",$_POST['address_1'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[address line 1]&nbsp;";
		echo "school name wrong";
	}if(!preg_match("/^[A-Za-z0-9' -]{0,150}$/",$_POST['address_2'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[address line 2]&nbsp;";
		echo "school name wrong";
	}if(!preg_match("/^[A-Za-z' -]{1,35}$/",$_POST['city'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[town/city]&nbsp;";
		echo "mascot wrong";
	}if(!preg_match("/^[A-Za-z)(' -]{1,50}$/",$_POST['state'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[state/region]&nbsp;";
		echo "city wrong";
	}if(!preg_match("/^[A-Za-z)(' -]{1,50}$/",$_POST['country'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[country]&nbsp;";
		echo "country wrong";
	}if(!preg_match("/^[A-Za-z).,&!*(' -]{1,100}$/",$_POST['job_company'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[current company/employer]&nbsp;";
		echo "country wrong";
	}if(!preg_match("/^[A-Za-z).,&!*(' -]{1,100}$/",$_POST['job_position'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[current job]&nbsp;";
		echo "country wrong";
	}
	
	if(isset($_POST['job_position_past_1'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_position_past_1'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past job #1]&nbsp;";
		echo "country wrong";
	}}
	
	if(isset($_POST['job_company_past_1'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_company_past_1'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past company/employer #1]&nbsp;";
		echo "country wrong";
	}}
	
	if(isset($_POST['job_position_past_2'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_position_past_2'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past job #2]&nbsp;";
		echo "country wrong";
	}}
	
	if(isset($_POST['job_company_past_2'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_company_past_2'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past company/employer #2]&nbsp;";
		echo "country wrong";
	}
	}
	if(isset($_POST['job_position_past_3'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_position_past_3'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past job #3]&nbsp;";
		echo "country wrong";
	}
	}
	if(isset($_POST['job_company_past_3'])){
	if(!preg_match("/^[A-Za-z).,&!*(' -]{1,50}$/",$_POST['job_company_past_3'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['format_incorrect_prof'])) $_SESSION['format_incorrect_prof']=" ";
		$_SESSION['format_incorrect_prof'] .= "&nbsp;[past company/employer #3]&nbsp;";
		echo "country wrong";
	}}
	


//check for empties	
if(empty($_POST['address_1'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[address line 1]&nbsp;";
		echo "field blank";
}if(empty($_POST['city'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[city]&nbsp;";
		echo "field blank";
}if(empty($_POST['state'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[state/region]&nbsp;";
		echo "field blank";
}if(empty($_POST['zip'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[zip/postal code]&nbsp;";
		echo "field blank";
}if(empty($_POST['job_position'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[current job]&nbsp;";
		echo "field blank";
}if(empty($_POST['job_company'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[current company/employer]&nbsp;";
		echo "field blank";
}if(empty($_POST['class_of'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[class of]&nbsp;";
		echo "field blank";
}if(empty($_POST['country'])){
		$_SESSION['prof_error']="true";
		if(!isset($_SESSION['blank_fields'])) $_SESSION['blank_fields']=" ";
		$_SESSION['blank_fields'] .= "&nbsp;[country]&nbsp;";
		echo "field blank";
}
	
//redirect after error testing
//	if(isset($_SESSION['prof_error'])){
//		echo "Redirect to page before p, showing  errors";
//		header("Location: generic.php?job=update_profile");
//	}
	
	
	

// define a constant for the maximum upload size
define ('MAX_FILE_SIZE', 1024 * 150);	
ini_set('upload_max_filesize',MAX_FILE_SIZE) ;

//TESTS UPLOADED IMAGE 1
// define constant for upload folder

 define('UPLOAD_DIR', 'C:\xampp\htdocs\images\\');
// TESTING IMAGE 1

//  maximum upload size already defined above


echo "<br/> Strart testing image 1";
if (array_key_exists('current_picture', $_FILES)) {



  // create filename
  $file2 = "current\dn_".$_SESSION['member_index']."_current";  //str_replace(' ', '_', $_FILES['school_picture']['name']);
  echo $file2;
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png','');
  
 // $errors = $_FILES['_picture']['error'];
 
  // check if a file of the same name has been uploaded
        if (file_exists(UPLOAD_DIR . $file2.".jpg")) {
			$date = date('h-i-s--j-m-y');
			rename(UPLOAD_DIR . $file2.".jpg" , UPLOAD_DIR . $file2 .$date.".jpg");
			
			}
          // move the file to the upload folder and rename it
	
    switch($_FILES['current_picture']['error']) {
      case 0:
	  
        $mn = 350;
		$mx = 400;
		manage($_FILES['current_picture']['tmp_name'], $mn, $mx, $file2);
		$current_picture = "images/current/dn_".$_SESSION['member_index']."_current.jpg";
		echo "<br/> Uploaded image: ".$current_picture;
        /*
        if ($success) {
          echo "$file2 uploaded successfully.";
        } else {
          $_SESSION['prof_error']= "true";
		  $_SESSION['upload_error_prof_2'] = "Error uploading mascot picture. Please try again.";
		  echo $_SESSION['upload_error_prof_2'];
        }*/
        break;
	case 1:
		$_SESSION['prof_error']= "true";
		$_SESSION['upload_error_prof_1'] = "Your recent picture is too large. ";
		echo "Error 2";
		break;
	case 2:
		$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_2'] = "Your recent picture is too large. ";
			echo "Error 2";
			break;
      case 3:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_2'] = "The recent picture file was only partially uploaded. ";
			echo "Error 3";
			break;
      case 4:
        $_SESSION['prof_error']= "true";
		$_SESSION['upload_error_prof_2'] = "You didn't select a file to be uploaded.";
		echo "Error 4";
		echo $_SESSION['upload_error_prof_2'];
		break;
	case 6:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_2'] = "Missing a temporary folder.";
			echo "Error 6";
			break;
      case 7:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_2'] = "Failed to write file to disk. ";
			echo "Error 7";
			break;
      case 8:
        $_SESSION['prof_error']= "true";
		$_SESSION['upload_error_prof_2'] = "A PHP extension stopped the file upload. Please report to the webmaster email address given below.";
		echo  $_SESSION['upload_error_prof_2'];
		echo "Error 8";
        break;
      
    }
  
}//else{
//	$_SESSION['prof_error']= "true";
//		$_SESSION['upload_error_prof_2'] = "Upload failure. Please report to the webmaster email address given below.";
//}


// TESTING IMAGE 2

//  maximum upload size already defined above

echo "<br/> Strart testing image 2";

if (array_key_exists('hs_picture', $_FILES)) {

	

  // make file name
  $file = "past\dn_".$_SESSION{'member_index'}."_hs";  //str_replace(' ', '_', $_FILES['mascot_picture']['name']);
  echo $file;
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png','');
  

  // check if a file of the same name has been uploaded
        if (file_exists(UPLOAD_DIR . $file.".jpg")) {
			$date = date('h-i-s--j-m-y');
			rename(UPLOAD_DIR . $file.".jpg" , UPLOAD_DIR . $file .$date.".jpg");
			
			}
          // move the file to the upload folder and rename it
	
    switch($_FILES['hs_picture']['error']) {
      case 0:
	  
        $mn = 350;
		$mx = 400;
		manage($_FILES['hs_picture']['tmp_name'], $mn, $mx, $file);
		$hs_picture = "images/past/dn_".$_SESSION['member_index']."_past.jpg";
		//$success = move_uploaded_file($image, UPLOAD_DIR_2 .$file);
		//$mascot_picture = UPLOAD_DIR_2 .$file;
		echo "<br/> Uploaded image: ".$hs_picture;
        /*
        if ($success) {
          echo "$file uploaded successfully.";
        } else {
          $_SESSION['prof_error']= "true";
		  $_SESSION['upload_error_prof_2'] = "Error uploading mascot picture. Please try again.";
		  echo $_SESSION['upload_error_prof_2'];
        }*/
        break;
		case 1:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_1'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			echo "Error 2";
			break;
	case 2:
		$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_1'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			echo "Error 2";
			break;
      case 3:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_1'] = "The uploaded file was only partially uploaded. ";
			echo "Error 3";
			break;
      case 4:
        $_SESSION['prof_error']= "true";
		$_SESSION['upload_error_prof_1'] = "You didn't select a file to be uploaded.";
		echo "Error 4";
		echo $_SESSION['upload_error_prof_1'];
		break;
	case 6:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_1'] = "Missing a temporary folder.";
			echo "Error 6";
			break;
      case 7:
			$_SESSION['prof_error']= "true";
			$_SESSION['upload_error_prof_1'] = "Failed to write file to disk. ";
			echo "Error 7";
			break;
      case 8:
        $_SESSION['prof_error']= "true";
		$_SESSION['upload_error_prof_1'] = "A PHP extension stopped the file upload. ";
		echo  $_SESSION['upload_error_prof_1'];
		echo "Error 8";
        break;
      
    }
  
}//else{
//	$_SESSION['prof_error']= "true";
//	$_SESSION['upload_error_prof_1'] = "Upload failure. Please report to the webmaster email address given below.";
//	echo "baaaaaahhhhhhh!!!!!";
//}

	
	
	//redirect after error testing
	if(isset($_SESSION['prof_error'])){
		echo "Redirect to page, showing  errors";
		header("Location: generic.php?job=update_profile");
	}
	
	foreach($_POST as $key => $value){
	$data[$key]=trim(strip_tags($value));
}
	//clean data and set intermediary variables
	
	if(isset($data['undergrad_college'])){
	$data['undergrad_college'] = ucwords($data['undergrad_college']);
	}
	
	


	$hs_picture = addslashes($hs_picture);
	$current_picture = addslashes($current_picture);
	
	echo "Data trimmed and tags stripped.";
	

	
/////////////////////
// Execute queries //
/////////////////////	

include('UncleJoesCookies.php');
	
	$cxn = mysqli_connect($hostname, $username, $password, $database)
		or die("Login failed.");
	mysqli_select_db($cxn, $database)
		or die("Database selection failedx");
foreach($data as $key => $value){
	$query = "update profile set $key = '".$value."'  where member_index = '".$_SESSION['member_index']."'";
	executeNoLogin($cxn, $query);
}

$query1 = "update profile set school_id_1 = '".$_SESSION['school_id_1']."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query1);

$query2 = "update profile set school_id_2 = '".$_SESSION['school_id_2']."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query2);


$query3 = "update profile set school_id_3 = '".$_SESSION['school_id_3']."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query3);

$query4 = "update profile set school_id_4 = '".$_SESSION['school_id_4']."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query4);

$query5 = "update profile set hs_picture = '".$hs_picture."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query5);

$query6 = "update profile set current_picture = '".$current_picture."'  where member_index = '".$_SESSION['member_index']."'";
executeNoLogin($cxn,$query6);

echo "profile updated";
	
	//header("Location: generic.php?job=profile");

?>

