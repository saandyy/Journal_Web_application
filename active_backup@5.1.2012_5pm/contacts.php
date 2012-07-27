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
	  
		<form id="contact" name="contact" action="contacts.php" method="post">

			<p><label><b>Name:</b> <input type="text" id="name" name="name" value="" /></label></p>

			<p><label><b>Email:</b> <input type="text" id="email" name="email" value="" /></label></p>

			<p><label><b>Select the topic options:</b>
			<select name="mydropdown">
			
			<?php
					$dbLink = new mysqli('localhost', 'root', '', 'astahost');
					if(mysqli_connect_errno()) {
						die("MySQL connection failed: ". mysqli_connect_error());
					}
					 
					// Query for a list of all existing files
					$sql = 'SELECT * FROM topics';
					$result = $dbLink->query($sql);
								
					if($result) {
					// Make sure there are topics
					if($result->num_rows > 0) {
					
						while($row = $result->fetch_assoc()) {
						//echo "<option value="{$row['topic_id']}">{$row['topic_name']}</option>";
						echo '<option value="' . $row['topic_id'] . '">' . $row['topic_name'] .  '</option>';
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
			
			<p><label><b>Comment:</b><br /><br /><textarea id="comment" name="comment"></textarea></label></p>
			
			

			<input type="hidden" id="action" name="action" value="submitform" />

			<p><input type="submit" id="submit" name="submit" value="Submit" />

		</form>
		
<?php
		//include the connection file

		//require_once('connection.php');

		//require_once('class.phpmailer.php');
		require "editors/editor1/class.phpmailer.php";
		$mail= new PHPMailer();



		if(isset($_POST['action']) && $_POST['action'] == 'submitform')
		{
			
			$err = array();
			/*
			if(!checkLen($_POST['name']))
				$err[]='The name field is too short or empty!';

			if(!checkLen($_POST['email']))
				$err[]='The email field is too short or empty!';
			
			else if(!checkEmail($_POST['email']))
			
				if(!checkEmail($_POST['email']))
					$err[]='Your email is not valid!';

			/*
			if(!checkLen($_POST['comment']))
				$err[]='The message field is too short or empty!';
				
			
			function checkLen($str,$len=2)
			{
				//return isset($_POST[$str]) && mb_strlen(strip_tags($_POST[$str]),"utf-8") > $len;
				return  mb_strlen(strip_tags($_POST[$str]),"utf-8") > $len;
			}
			
			
			function checkEmail($str)
			{
				return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
			}
			*/
			
			
			
			
			//recieve the variables
			$name = $_POST['name'];
				
			//$url = $_POST['url'];
			$comment = $_POST['comment'];
			$email =  $_POST['email'];
			//$ip = gethostbyname($_SERVER['REMOTE_ADDR']);
			
			//save the data on the DB
			
			//mysql_select_db($dbname, $connection);
			
			/*
			$insert_query = sprintf("INSERT INTO contact_form (name, email,comment, date) VALUES (%s,%s, %s, NOW())",
									sanitize($name, "text"),
									sanitize($email, "text"),
									sanitize($comment, "text"),
									sanitize($ip, "text"));
			
			$result = mysql_query($insert_query) or die(mysql_error());
			
			
			
			if($result)
			{
			*/
					$mail->IsSMTP(); // telling the class to use SMTP
					$mail->Host       = "mail.yourdomain.com"; // SMTP server
					$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
															   // 1 = errors and messages
															   // 2 = messages only
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
					$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
					$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
					$mail->Username   = "testingwamp";  // GMAIL username
					$mail->Password   = "testingWAMP1986";            // GMAIL password

				
					
					
					$msg=
					'Name:	'.$_POST['name'].'<br />
					Email:	'.$_POST['email'].'<br />
					

					Message:<br /><br />

					'.nl2br($_POST['comment']).'

					';		
					
					$emailAddress= "sundeep.sundeep@gmail.com";
					$mail->AddAddress($emailAddress);
					$mail->SetFrom($_POST['email'], $_POST['name']);
					//$mail->Subject = "A comment from new ".mb_strtolower($_POST['subject'])." from ".$_POST['name']." | contact form feedback";
					$mail->Subject = "A contact form feedback";
				
					$mail->MsgHTML($msg);
					$mail->Send();
				
				
		}

?>

		
			  
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


<