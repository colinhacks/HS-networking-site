<?
session_start();
?>
<? include('UncleJoesCookies.php'); ?>
<?
include('functions.php');
	
	
	$_SESSION['school_id'] = get("school_id_1","profile","member_index","".$_SESSION['member_index']);
	if(!isset($_SESSION['page_visits'])){
		$_SESSION['page_visits']=1;
	}else{
		$_SESSION['page_visits'] = $_SESSION['page_visits'] + 1;
	}
	if(!isset($_SESSION['logged_in']))
		{
		//echo "user not logged in, redirect to index";
		header("Location: index.php");
	}



//set include_path in php.ini
//ini_set("include_path",".:.\includes");

	//$hostname = "localhost";
//	$username = "root";
	//$password = "";
	//$database = "member";
	
	
//setting var
if(!isset($_SESSION['school_id']) and !@$_GET['job']=="school_select"){
	//echo "redirect to school select page";
	header('Location: '.$_SERVER['PHP_SELF'].'?job=school_select');
}
echo "<!DOCTYPE html>";
echo "<html>";

?>

<head>
	<META name="Author" content="Colin McDonnell">
	<META name="Copyright" content="copyright 2012">
	<META name="Description" content="The one and only networking website for alumni of Department of Defense school.">
	<META name="Keywords" content="dodea,network,alumni,reunion, dod, school, dodds">
	<LINK href="mystyle.css" rel="stylesheet" type="text/css">

	
<title>The DoDEA Network</title>

	<style>
	
	</style>
</head>

<body>

<table id="outer">

<tr>
	<td style="border: 2px black solid;" id="logo-box">
		<a  style="vertical-align:middle;width:200px;" title="Home Page" href="index.php" >
			<img id="logo" src="logorevised.jpg" />
		</a>
	</td>
	
	<td style="border: 2px black solid;" class="row1" style="line-height:100%;width:35%;">
		
		<a  class="infobar" href='generic.php?job=profile_page&member_index=<?php echo $_SESSION['member_index']?>' style="font-size:medium;font-weight:bold;font-variant:small-caps">
		<?php
			
			echo get('first_name', 'memberregistration', 'member_index',''.$_SESSION['member_index']);
			echo " ";
			echo get('last_name', 'memberregistration', 'member_index',''.$_SESSION['member_index']);
		?>
		
		<br/></a>
		
		<?php
		$class_of = get('class_of', 'profile', 'member_index',''.$_SESSION["member_index"]);
		if(isset($class_of) and $class_of !== '0'){
		 echo "<a href='class.php'  class='infobar'><em>";
		 echo "Class of ".$class_of;
		 echo "</em></a>";
		}
		//else{
		//	echo "<a class='infobar' href='profile.php'>Create/Edit Profile</a>";
		
		//}
		echo "<hr/>";
		$school_name = get('school_name_1', 'profile', 'member_index',''.$_SESSION["member_index"]);
		$school_name_2 = get('school_name_2', 'profile', 'member_index',''.$_SESSION["member_index"]);
		$school_name_3 = get('school_name_3', 'profile', 'member_index',''.$_SESSION["member_index"]);
		$school_name_4 = get('school_name_4', 'profile', 'member_index',''.$_SESSION["member_index"]);
		if(isset($school_name)){
			echo '<a  class="infobar"  href="generic.php?job=school&id='.get("school_id_1","profile","member_index","".$_SESSION["member_index"]).'">';
			echo $school_name;
			echo "</a>";
			
			if(isset($school_name_2)){
			echo '<a  class="infobar"  href="generic.php?job=school&id='.get("school_id_2","profile","member_index","".$_SESSION["member_index"]).'>';
			echo $school_name;
			echo "</a>";
		}
			if(isset($school_name_3)){
			echo '<a  class="infobar"  href="generic.php?job=school&id='.get("school_id_3","profile","member_index","".$_SESSION["member_index"]).'>';
			echo $school_name;
			echo "</a>";
		}
			if(isset($school_name_4)){
			echo '<a  class="infobar"  href="generic.php?job=school&id='.get("school_id_4","profile","member_index","".$_SESSION["member_index"]).'>';
			echo $school_name;
			echo "</a>";
		}
		}else{
			echo "<span style='font-style:none;'>Check the box of all the DoDEA schools you attended in high school (max 4).";
			
		}
		 ?>
	</td>
		
	<!--<td style="border: 2px black solid;" class="row1" >
		<!--<form id="search" action="search.php">
	 	  	<input type="text" value="Site Search" size="10%" /><br/>
		</form>		
		<a class="fake_button" href="advanced-search.html">Search Site</a>
	</td>-->
	
		<td style="border: 2px black solid;" class="row1" >
		<!--<form id="search" action="search.php">
	 	  	<input type="text" value="Site Search" size="10%" /><br/>
		</form>		-->
		<a class="fake_button" style='padding:5px;background-color:white;color:#A80000;border-color:grey' href="advanced-search.html">Search Site</a>
	</td>
	
	<td style="border: 2px black solid;" class="row1"  style="width:175px;">
		
		<a href="messages.html"><img  class="icon" src="message.jpg" "/></a>
		<a href="forum.html"><img  class="icon" src="forumicon.png"  /></a>
		<a href="friendrequest.html"><img  class="icon" src="personicon.jpg"  /></a>
	</td>	
	
</tr>

	

<tr >
	<td valign='top' style="width:200px;text-align:center;border:2px black solid;min-height:800px;" >
		
		<table id="navigation" style="width:100%;">
		<tr class="navrow" ><td style="text-align:center;"><a   class="link"  href="reunion_page.html">Reunions </a></td></tr>
		<tr class="navrow" ><td style="text-align:center;"><a  class="link"    href="album_page.html">Photo Albums </a></td></tr>
		<tr class="navrow" ><td style="text-align:center;"><a   class="link"   href="newsletter_page.html">Newsletter</a></td></tr>
		<tr class="navrow" ><td style="text-align:center;"><a    class="link"   href="memorial_page.html">Memorial</a></td></tr>
		<tr class="navrow" ><td  style="text-align:center;"><a   class="link"   href="newsletter_page.html">Yearbooks</a>  </td></tr>
		<tr><td style="text-align:center;" ><hr/><a style="text-align:center;color:white" class="button" href="logout.php">Logout</a></td></tr>
		
		</table>
			  
	</td>
	<td valign="top" style="min-height:800px;border: 2px black solid;background-color:white" colspan="3" >
		<div style="text-align:center;border: 0px green solid; color:#A80000;margin:auto;width:100%;">
			<?php
				ini_set("include_path",'C:\xampp\htdocs\includes');
				if(@$_GET['job'] == "school_select"){
					include('school_select.php');
				}else if(@$_GET['job'] == "create_school"){
					include('create_school.php');
				}else if(@$_GET['job'] == "test2"){
					include('test2.php');
				}else if(@$_GET['job'] == "school"){
					$_SESSION['current_school'] = $_GET['id'];
					include('school.php');
				}else if(@$_GET['job'] == "admin_responsibilities"){
					include('admin_responsibilities.php');
				}else if(@$_GET['job'] == "update_profile"){
					include('update_profile.php');
				}else if(@$_GET['job'] == "info_request_info"){
					include('info_request_info.php');
				}
				
			?>
		</div>
		
	</td>
</tr>
<tr style="height:20px;font-style:bold;text-align:center;color:white;border:2px black solid" >
	
	<td colspan="4">Comments? Questions? Concerns? Complaints? Debates? Disputes? Dilemmas? Contact: DNetWebmaster@gmail.com</td>
</tr>
</table>

</body>

</html>