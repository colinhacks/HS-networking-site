<html><head><title>Bratlink</title></head><body><p>
<?php

			
			$cxn = mysqli_connect("localhost", "root","", "member")
				or die("Login failed.");
			mysqli_select_db($cxn, "member")
				or die("Database selectino failedx");
			function get($descriptor, $table){
			$query= "Select $descriptor from $table where member_index='1'";
			$result = mysqli_query($cxn, $query)
				or die("Query failed");
			$row = mysqli_fetch_assoc($result);
			echo $row['first_name'];
		
			}
			
			$thing = "first_name";
			$stuff = "memberregistration";
			get($thing, $stuff);
?>
</p></body></html>