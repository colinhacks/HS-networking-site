<?php
$school_id = $_SESSION['current_school'];
$rows = getRowsNoSort("school","school_id","".$school_id);
while ($row = mysqli_fetch_assoc($rows)){
	extract ($row);
}
?>
<div style="width:100%;background:url(red_fade.jpg);background-size:100% 100%;">
<table style="border:0px black solid;width:80%;text-align:center;margin-left:10%;margin-right:auto">
<tr >
<td colspan="2" style='color:#FFFFFF;font-size:4em;text-align:left;font-variant:small-caps;'><?php echo get("school_name","school","school_id","".$school_id) ?></td>
</tr>
	<tr>
		<td style="border:0px black solid">
			<img style="width:100%;border:2px black solid" alt="<?php echo get("school_pic","school","school_id","".$school_id)?>" src="<?php echo get("school_pic","school","school_id","".$school_id) ?>">
		</td>
		<td style="border:0px black solid">
			
		</td>
	</tr>
	<tr style="vertical-align:text-top;">
		<td style="border:0px black solid;vertical-align:text-top;"><div style="border:0px black solid;color:#A80000;font-size:3em;font-style:italic;float:right;margin-right:25px;vertical-align:text-top;">Home of the <?php echo $mascot."<br/>"; ?></div></td>
		<td style="vertical-align:inherit;">
			<div>
			<img style="margin-top:-20px;margin-left:-20px;width:150px;border: 2px black solid;float:left;position:relative;" width="100px" src="<?php echo "./".get("mascot_pic","school","school_id","".$school_id) ?>" alt="<?php echo get("mascot_pic","school","school_id","".$school_id)?>"/>
			<!--top:-60px;left:-40px;-->  
			</div>
		</td>
	
	</tr>
</table>
</div>
<br/>
<hr />	<!--style='margin:top:-140px;'-->
<br/>
			<div style="width:200px;margin:15px;padding:10px;background-color:white;color:#A80000;font-size:large;border:4px black solid;float:left;">
				<center>
					<div style="text-align:left;font-weight:bold">Location:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div >
					<?php echo $city.", ".$state; ?>
					<br/>
					<div style="text-align:left;font-weight:bold"><br/>Base(s):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div >
					<?php echo $base1; ?><br/>
					<?php if(isset($base2)) echo $base2 . "<br/>"; ?>
					<?php if(isset($base3)) echo $base3 . "<br/>"; ?>
					<div style="text-align:left;font-weight:bold"><br/>School website:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div >
					<?php if (isset($school_website )) echo "<a target='_blank' href=".$school_website."><span class='fake_button' style='color:black;text-decoration:none'>click here</span></a>"; ?><br/>
					<div style="text-align:left;font-weight:bold"><br/>Alumni network website:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div >
					<?php if(isset($network_website)) echo "<a target='_blank' href=".$network_website."><span class='fake_button' style='color:black;text-decoration:none'>click here</span></a>"; ?><br/>
				</center>
			</div>

		<div class="fieldset_title" style="margin-left:40px;float:left;text-decoration:underline;">Browse Classes</div>
		<br/><br/><br/>
		<table id='class_table' style='cellspacing:6px;font-style:none;text-decoration:none;color:black;text-align:center'>
			<?php $counter=1945;
			$year = date('Y');
			$extra = ($year % 10) - 1;
			echo "<tr>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			while ($counter <= $year){
				if($counter % 10 == 0){
					echo "</tr><tr>";
				}
				echo "<td><a class='class_data' href='generic.php?job=class&sid=$school_id&yrid=$counter' >$counter</a></td>";
				$counter++;
			}
			for ($counter = $extra;$extra >0;$extra--){
				echo "<td>&nbsp;</td>";
			}
			echo "</tr></table>";
		
		?>
		</table>

<span></span>
