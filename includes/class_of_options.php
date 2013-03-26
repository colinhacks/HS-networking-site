

Class of: 
<?php

$year = date("Y") +4;
$counter=$year;
echo '<select  style="border:2px #12146B solid;width:15em;padding:5px;margin:5px;" id="class_of" name="class_of" >';
if(!isset($_SESSION["co"])){
	echo "<option value='' selected='selected'>Choose class</option>";
}
while($counter>1944){
	
	if(isset($_SESSION["co"]) and $counter ==$_SESSION["co"]){
		echo "<option value='$counter' selected='selected'>$counter</option>";
	}else{
		echo "<option value='$counter'>$counter</option>";
	}
	$counter = $counter - 1;
}
echo '</select>';

?>