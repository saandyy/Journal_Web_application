<?php
//session_start();
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
			header("Location:index.html");
	}


if(isset($_POST['submit'])) {
$selected_value = $_REQUEST['moptions'];
		if($selected_value == "view"){
			header("Location:view.php");
		}
		if($selected_value == "download"){
			header("Location:download2.php");
		}
		if($selected_value == "upload"){
			header("Location:upload5.php");
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
    <div id="navigation"><a href="index.html" class="style1">Home</a> | <a href="news.html" class="style1">News</a> |<a href="staff.html" class="style1"> Staff </a>| <a href="sale.html" class="style1">Sale</a> | <a href="photogallery.html" class="style1">Gallery</a> | <a href="contacts.php" class="style1">Contact Us</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="logout.php" class="style1">Logout</a></div>
  	<div id="headerImg"> </div>
	<div id="bodyArea">
	
	<div id="left">
		<p>	
			<p>This is secured page with session:<b>  <?php echo $_SESSION['username']; ?> </b>
			</p>
			
			<form action="memberspage.php" method="post">
				
				<label for="options"><center> Select the appropriate option:<br><br></label>
				<select id="memberoptions" name="moptions">
					<option value="view">View Previous Editions</option>
					<option value="download">Download Previous Editions</option>
					<option value="upload">Upload your Submissions</option>
				</select>
				<input type="submit" name="submit" value="Submit" />
			</form>
			
			
			
			<!-- <p> <a href="logout.php">Logout</a></p> -->
	  	</p>
	 </div>
	<div id="right"></div>
	<div id="footer">
				<div align="center">Copyright © 2012 by Calaveras Station Literary Journal and the CSUS English Department </div>
	</div>
	</div>
	
</div>
</body>
</html>


