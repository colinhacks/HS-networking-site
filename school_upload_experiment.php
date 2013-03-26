<?php
include('functions.php');
?>
<?php
// TESTING IMAGE 2

//  maximum upload size already defined above
echo "<br/> Strart testing image 2";
if (array_key_exists('mascot_picture', $_FILES)) {

  // define constant for upload folder
  // replace any spaces in original filename with underscores
  $file = "\\bl_".$_SESSION['sn']."_school";  //str_replace(' ', '_', $_FILES['mascot_picture']['name']);
  echo $file;
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png','');
  
  
  
  echo  $_FILES['mascot_picture']['name'];
  echo "<br/>";
   echo  $_FILES['mascot_picture']['tmp_name']; echo "<br/>";
    echo  $_FILES['mascot_picture']['error']; echo "<br/>";
	 echo  $_FILES['mascot_picture']['type'];
  
  // check if a file of the same name has been uploaded
        if (file_exists(UPLOAD_DIR . $file)) {
			$date = date('h-i-s--j-m-y');
			rename(UPLOAD_DIR . $file , UPLOAD_DIR . $file .$date);
			unlink(UPLOAD_DIR . $file);
			echo "<br/> file unlinked!!!!!";
			}
          // move the file to the upload folder and rename it
	
	$mn = 600;
	$mx = 700;
	echo "<br/> start!!!!!";
	echo $_FILES['mascot_picture']['tmp_name'];
	$image = resize(@$_FILES['mascot_picture']['tmp_name'], $mn, $mx);
	$errors = $_FILES['mascot_picture']['error'];
	if($errors == 1 or $errors == 2){
		$errors = 0;
	}
	  echo "<br/> end!!!!!";
	  
  echo "<br/> start switch!!!!!";
    switch($errors) {
      case 0:
        
		$success = move_uploaded_file($image, UPLOAD_DIR .$file);
		$mascot_picture = UPLOAD_DIR .$file;
		echo $mascot_picture. "uploaded: name is ".UPLOAD_DIR.$file;
        
        if ($success) {
          echo "$file uploaded successfully.";
        } else {
          $_SESSION['sch_error']= "true";
		  $_SESSION['upload_error2'] = "Error uploading mascot picture. Please try again.";
		  echo $_SESSION['upload_error2'];
        }
        break;
	case 2:
		$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
			echo "Error 2";
			break;
      case 3:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "The uploaded file was only partially uploaded. ";
			echo "Error 3";
			break;
      case 4:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "You didn't select a file to be uploaded.";
		echo "Error 4";
		echo $_SESSION['upload_error2'];
		break;
	case 6:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Missing a temporary folder.";
			echo "Error 6";
			break;
      case 7:
			$_SESSION['sch_error']= "true";
			$_SESSION['upload_error2'] = "Failed to write file to disk. ";
			echo "Error 7";
			break;
      case 8:
        $_SESSION['sch_error']= "true";
		$_SESSION['upload_error2'] = "A PHP extension stopped the file upload. ";
		echo  $_SESSION['upload_error2'];
		echo "Error 8";
        break;
      
    }
  
}else{
	echo "Picture 2 key doesn't exist";
}








function resize($file_name, $min_width, $max_width){
		echo "$file_name";
		$file = "\\bl_".get("school_id","school","school_name","".$_POST['school_name'])."_school";  
		$size2 = getImageSize($file_name);
		echo "<br/> Set:".$size2;
		$extType2 = $size2[2];
		$extString2 = image_type_to_extension ($extType2,$include_dot = TRUE );
		$extension = strtolower($extString2);
		echo "<br/> Set:".$extension;
		$uploadedfile = $file_name;		
		if($extension=="jpg" || $extension=="jpeg" )
		{
		$src = imagecreatefromjpeg($uploadedfile);
		}else if($extension=="png")
		{
		$src = imagecreatefrompng($uploadedfile);
		}else{
		$src = imagecreatefromgif($uploadedfile);
      }
	echo "<br/> image created";


	$width = $size2[0];
	echo $width;
	$height = $size2[1];
	echo $height;
	$new_width = $width;
	$new_height = $height;
	
	while($new_width > $max_width){
		$new_width = .95 * $new_width;
		$new_height = .95 * $new_height;
		echo $new_width;
		echo $new_height;
	  }
	  while($new_width < $min_width){
		$new_width = 1.05 * $new_width;
		$new_height = 1.05 * $new_height;
		echo $new_width;
		echo $new_height;
	  }
	  
	 $tmp = imagecreatetruecolor($new_width,$new_height);
	 echo "<br/> field created..";
	 imagecopyresampled($tmp,$src,0,0,0,0,$new_width,$new_height,$width,$height);
	  echo "<br/> imagecopyresampled..";
	 imagejpeg($tmp,UPLOAD_DIR.$file,100);
	  echo "<br/> imagejpeg..";
	 return $file;
}?>