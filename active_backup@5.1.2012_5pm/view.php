<?php

if(isset($_REQUEST['submit'])) {
$selected_value = $_REQUEST['mydropdown'];
		if($selected_value != ""){
			header("Location:viewone.php?id={$selected_value}");
			/*
			echo "
                <tr>
                  	<td><a href='{$row['path']}'>Open</a></td>
				</tr>";
			*/
		}
		else{
			echo "pls select the relevant1 topic to upload";
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #000025;
	background-image: url(images/bg.jpg);
	background-repeat: repeat-x;
}
-->
<!--
a:link {text-decoration: none}
a:visited {text-decoration: none}
a:active {text-decoration: none}
a:hover {text-decoration: underline}
-->
</style>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>
<div id="pamwrapper">
    <div id="logo"><a href="index.html"><img src="images/sample2.jpg" alt="mystic" border="0" /></a></div>
    <div id="navigation"><a href="index.html" class="style1">Home</a> | <a href="news.html" class="style1">News</a> |<a href="staff.html" class="style1"> Staff </a>| <a href="sale.html" class="style1">Sale</a> | <a href="photogallery.html" class="style1">Gallery</a> | <a href="contacts.php" class="style1">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="logout.php" class="style1">Logout</a></div>
  	<div id="headerImg"> </div>
	<div id="bodyArea">
	
	<div id="left"><body>
		<form name="myform" action="view.php" method="POST">
		<div align="center"> <center><p><b>Please Select the Year to View</b><br>
		<br>
			<select name="mydropdown">
				<?php
			$dbLink = new mysqli('localhost', 'root', '', 'astahost');
			if(mysqli_connect_errno()) {
				die("MySQL connection failed: ". mysqli_connect_error());
			}
			 
			// Query for a list of all existing files
			$sql = 'SELECT * FROM download_annual_editions';
			$result = $dbLink->query($sql);
						
			if($result) {
			// Make sure there are topics
			if($result->num_rows > 0) {
			
				while($row = $result->fetch_assoc()) {
				//echo "<option value="{$row['topic_id']}">{$row['topic_name']}</option>";
				echo '<option value="' . $row['id'] . '">' . $row['name'] .  '</option>';
				//echo '<option value= <a href = "' . $row['id'] . '">' . $row['name'] .  '</option>';
				//echo "<option value=1>1</option>";
				}
			}
			// Free the result
			$result->free();
			}
			
			// Close the mysql connection
			$dbLink->close();
			?>
				
			</select>
		</div>
		<Center> <input type="submit" name="submit" value="View"> </center>
		</form>
	</div>
	<div id="right"></div>
	<div id="footer">
				<div align="center">Copyright � 2012 by Calaveras Station Literary Journal and the CSUS English Department </div>
	</div>
	</div>
	
</div>
</body>
</html>

</body>
</html>
	
	
	
