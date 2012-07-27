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

			$sql="SELECT * FROM moderator_logins WHERE username='$username' and password='$password'"; 
			$result=mysql_query($sql); 

			// Mysql_num_row is counting table row 
			$count=mysql_num_rows($result); 
			
			$info = mysql_fetch_array($result);
			$temp1 = $info['topic_id'];
			// If result matched $username and $password, table row must be 1 row 
				if($count==1){ 
				
				//$info = mysql_fetch_array($result) 
			
				 //Print "<tr>"; 
				 //Print "<th>id:</th> <td>".$info['id'] . "</td> "; 
				// $temp1 = $info['topic_id'];				 
				 //Print "<th>topic_id:</th> <td>".$info['topic_id'] . "</td> "; 
				// Print "<th>Food:</th> <td>".$info['fav_food'] . "</td> "; 
				// Print "<th>Pet:</th> <td>".$info['pet'] . " </td></tr>"; 
			
				// Register $username, $password and redirect to file "memberspage.php" 
				session_start();
				//$_SESSION["username"];
				//$_SESSION["password"];
				//session_register('username'); 
				//session_register('password'); 
				$_SESSION['username']= $username;
				$_SESSION['topic_id']= $temp1;
				
				//header("Location:localhost/dream_calaveras/active_backup@2.3.2012_6am/memberspage.php"); 
				header("Location:editor_topic1.php");

			} 
			else { 
				header("Location:wrongusrpwd.php");
				
			} 
		} 

		?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>

		
		<form action="editor1login.php" method="post"> 
			<center >Username <input name="username" type="text"><br> </center> 
			<br>
			<center >Password <input name="password" type="password"><br> </center>
			<br>
			<center><input name="submit" type="submit" value="Login"> <center>
		</form>
		
			  
	  
	
</body>
</html>
