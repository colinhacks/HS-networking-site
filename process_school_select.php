<?php
include('functions.php');

	include('UncleJoesCookies.php');

	session_start();

//unset all error messages from previous attempt, if there is one
unset($_SESSION['choo_error']);
unset($_SESSION['too_many']);


//can retrieve any data point from any table, the row is designated with a where statement based on the identifier and its value
	
$num_selected = 0;
$rows = getOrderedRows("school", "school_id","desc", "0", "1");
	while ($row = mysqli_fetch_assoc($rows)){
		$si = $row['school_id'];}
		
for($counter = 1;$counter<=$si;$counter++){
	if(isset($_POST[''.$counter])){
		$num_selected++;
		$_SESSION['school_name_'.$num_selected] = get("school_name","school","school_id","".$_POST[''.$counter]);
		//echo $_SESSION['school_name_'.$num_selected].": "; 
		$_SESSION['school_id_'.$num_selected] = get("school_id","school","school_id","".$_POST[''.$counter]);
		//echo $_SESSION['school_id_'.$num_selected]."<br/>";
	}
}

if($num_selected > 4 ){
	$_SESSION['choo_error'] = 'true';
	$_SESSION['too_many'] = 'You\'ve selected more than the maximum number of schools (4).';
	header("Location: generic.php?job=school_select");
}

if($num_selected = 0 ){
	$_SESSION['choo_error'] = 'true';
	$_SESSION['unfilled'] = 'You haven\'t selected any schools.';
	header("Location: generic.php?job=school_select");
}


header("Location: generic.php?job=update_profile");

?>