<?php
	
	
	if (isset($_SESSION['logged_in'])){
		header('Location: generic.php');
	}
	session_start();
	

?><?php
include('functions.php');
?>
<!DOCTYPE html> 
 <html> 

 <head> 
	<META name='Author' content='Colin McDonnell'> 
<META name='Copyright' content='copyright 2012'> 
	<META name='Description' content='The one and only networking website for alumni of Department of Defense school.'> 
 	<META name='Keywords' content='dodea,network,alumni,reunion, dod, school, dodds'>
<LINK href='mystyle.css' rel='stylesheet' type='text/css'> 
 <title>BratLink - DoDEA Networking Site</title> 

	
</head>

<body style="margin-top:0px;padding-top:0px;border-top:0px;">


<table style="top:10px;" id='outer'>

<tr>
	<td style='border: 2px black solid;' id='logo-box'>
		<a valign="middle" style='width:200px;' title='Home Page' href='index.php' >
			<img id='logo' src='logorevised.jpg' />
		</a>
	</td>
	
	<td  class='row1' style='line-height:80%;width:35%;border: 2px black solid;'>
		<span style="font-size:medium;font-weight:bold;font-variant:small-caps">
		
		
		Welcome to the DoDEA Network!
		
		<br/></span>
		<span style="font-variant:none;font-size:small">The Official Networking Site for DoDEA Alumni
		
	</td>
		
	<td style="border: 2px black solid;" class="row1" >
		<form id="search">
	 	  	<input type="text" value="Site Search" size="10%" /><br/>
		  	<a class="link" href="advanced-search.html">Advanced</a>
		</form>		
	</td>
	
	<td  class="row1"  style="width:175px;border: 2px black solid;">
		
		<a href="messages.html"><img class="icon" src="message.jpg" "/></a>
		<a href="forum.html"><img  class="icon" src="forumicon.png"  /></a>
		<a href="friendrequest.html"><img  class="icon" src="personicon.jpg"  /></a>
	</td>	
	
</tr>

	

<tr >
	<td style="width:200px;border: 2px black solid;">
		<form action="checkmatch.php" method="POST">
		   
		    <table id="inner1"  title="Login">
			
			<tr style="text-align:center;font-weight:bold;color:white;font-size:medium;font-variant:small-caps;text-align:center">
				<td id="tdinner" style="background-color:#A80000">
					<span>Login:</span>
				</td>
			</tr>
			
			<tr style="font-size:small;"> 
				<td >
					Email:<br/><input tabindex="1" size="25" type="text" name="username" id="username" style="font-size:1em;text-align:left"/><br/>
				</td>
			</tr>
			
			<tr style="font-size:small;"> 
				<td id="tdinner" >
					Password:	<br/><input tabindex="2" size="25" type="password" name="user_pass" style="font-size:1em;text-align:left " id="password" /><br/>
				</td>
			</tr>
			
	
			
			<tr style="">
				<td>
					<center><input class="button" tabindex="3" style="color:white;text-decoration:none;" type="submit" value="Submit"/><br />
					<a class="button" style="color:white;text-decoration:none"	href='index.php?job=pass_retrieve'>Forgot password?</a></center>
				</td>
			</tr>
			
			<?php
				if(isset($_SESSION['login_result'])){
				echo "<tr style='text-align:center;background-color:white;color:#A80000'>";
					echo "<td>";
						echo $_SESSION['login_result'];
					echo "</td>";
				echo "</tr>";}
			?>
		
		
		</table>
			
		</form ><br/>
			  <center><span style='color:white;text-align:center'>
			 	 Not a member?<br />
				 <a  class='button' style='color:white;' href='index.php?job=register'>&nbsp;Register!&nbsp;</a><hr />
				</span></center>
	</td>
	<td valign="top" style="min-height:800px;border: 2px black solid;background-color:white;" colspan="3" >
		<div style="text-align:center;border: 0px green solid; margin:auto;width:95%;margin-top:15px;">
	
<?php	
		
	
		ini_set("include_path",'C:\xampp\htdocs\includes');
				if(@$_GET['job'] == "register"){
					include('register.php');
				}else if(@$_GET['job'] == "pass_retrieve"){
					include('pass_retrieve.php');
				}else if(@$_GET['job'] == "sec_question"){
					include('sec_question.php');
				}else if(@$_GET['job'] == "eat_cookies"){
					include('eat_cookies.php');
				}
	//and ($_GET['job'] !== 'register' or $_GET['job'] !== 'pass_retrieve' or $_GET['job'] !== 'sec_question' or $_GET['job'] !== 'eat_cookies')
	
	?>
	</div>
		
	</td>
</tr>

</table>

</body>
</html>