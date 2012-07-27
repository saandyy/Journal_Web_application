<?php 
		//session_start();
		//Database Information 
		$dbhost = "localhost"; 
		$dbname = "astahost"; 
		$dbuser = "root"; 
		$dbpass = ""; 

		//Connect to database 

		mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error()); 
		mysql_select_db($dbname) or die(mysql_error()); 

		if(isset($_POST['submit'])){ 

			// username and password sent from form 
			$username=$_POST['username']; 
			//$password=md5($_POST['password']); 
			$password=$_POST['password']; 

			// To protect MySQL injection (more detail about MySQL injection) 
			$username = stripslashes($username); 
			$password = stripslashes($password); 
			$username = mysql_real_escape_string($username); 
			$password = mysql_real_escape_string($password); 
			
			
			// To check for the empty fields
			
			$ok=1; 
			$error_message="";
			if($username == "") { $error_message = $error_message ."Username should not be empty <br>"; 
			$ok=0; 
			}
	
			if($password == "") {$error_message = $error_message ."Password should not be empty <br>";
			$ok=0; 
			}
			
			if ($ok==0) 
				{ 
						//echo "Sorry your file was not uploaded <br>"; 
						$error_message = $error_message ."Sorry you are not loggedin <br><br>"; 
						echo $error_message;
				} 
				
			else{

			$sql="SELECT * FROM tblusers WHERE username='$username' and password='$password'"; 
			$result=mysql_query($sql); 

			// Mysql_num_row is counting table row 
			$count=mysql_num_rows($result); 
			// If result matched $username and $password, table row must be 1 row 

			
			if($count==1){ 
				// Register $username, $password and redirect to file "memberspage.php" 
				session_start();
				$_SESSION['username']= $username;
				header("Location:memberspage.php");

			} 
			else { 
				header("Location:wrongusrpwd.php");
				
			} 
			
			
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
    <div id="navigation"><a href="index.html" class="style1">Home</a> | <a href="news.html" class="style1">News</a> |<a href="staff.html" class="style1"> Staff </a>| <a href="sale.html" class="style1">Sale</a> | <a href="photogallery.html" class="style1">Gallery</a> | <a href="contacts.php" class="style1">Contact Us</a>  </div>
  	<div id="headerImg"> </div>
	<div id="bodyArea">
	
	<div id="left">
	  <p>
	  
		<form action="" method="post"> 
			<center >Username <input name="username" type="text"><br> </center> 
			<br>
			<center >Password <input name="password" type="password"><br> </center>
			<br>
			<center><input name="submit" type="submit" value="Login"> <center>
		</form>
		
		
			  
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
