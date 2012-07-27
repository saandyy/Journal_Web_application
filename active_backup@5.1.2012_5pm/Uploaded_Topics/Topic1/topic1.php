<?php

$id = $_REQUEST['topic_id'];

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
<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>
<div id="pamwrapper">
     <div id="logo"><a href="../../index.html"><img src="../../images/sample2.jpg" alt="mystic" border="0" /></a></div> 
    <div id="navigation"><a href="../../index.html" class="style1">Home</a> | <a href="../../news.html" class="style1">News</a> |<a href="../../staff.html" class="style1"> Staff </a>| <a href="../../sale.html" class="style1">Sale</a> | <a href="../../photogallery.html" class="style1">Gallery</a> | <a href="../../contacts.php" class="style1">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="../../logout.php" class="style1">Logout</a></div>
  	<div id="headerImg"> </div>
	<div id="bodyArea">
	
	<div id="left">
	   <form enctype="multipart/form-data" action="topic1.php" method="post">
					 <center>Please choose a file and mention your email address: <br /><br /><input name="uploaded" type="file" /><br />
					 
					 <p><center> <label>Email: <input type="text" id="email" name="email" value="" /></label></p>
					 <input type="hidden" id="action" name="action" value="submitform" />
					 <input type="hidden" id="topic_id" name="topic_id" value="<?php echo $id; ?>" />
					 <center> <input type="submit" name ="submit" value="Upload" />
	  </form>
	  

	  
	  <?php
 
	 if($_POST['submit']){ 
	
				$fileName = $_FILES['uploaded']['name'];
				$tmpName  = $_FILES['uploaded']['tmp_name'];
				$fileSize = $_FILES['uploaded']['size'];
				$fileType = $_FILES['uploaded']['type'];
				$email = $_POST['email'];
				$target = "/wamp/www/dream_calaveras/active_backup@3.20.2012_12am/Uploaded_Topics/Topic1/Files/";
				$webpath = "/dream_calaveras/active_backup@3.20.2012_12am/Uploaded_Topics/Topic1/Files/";
				
				$filePath = $target . $fileName;
				$webpath1 = $webpath. $fileName;
				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
				
						
				if(!get_magic_quotes_gpc())
				{
						$fileName = addslashes($fileName);
				}
				
				$target = $target . basename( $fileName) ;
				$ok=1; 
				$error_message="";
				
				$allowed_types=array(
										"image/jpeg",
										"image/gif",
										"image/png",
										"text/plain",
										"application/msword",
										"application/pdf",
										"application/vnd.ms-excel");
						
				//This is our size condition 
				if ($fileSize > 35000000000) 
				{ 
						
						//echo "Your file is too large.<br>"; 
						$error_message = $error_message . "Your file is too large.<br>";
						$ok=0; 
				} 
				//echo "here".$ok;
				//echo "filetype".$fileType;
					
				if (isset($fileType))
				{
					
					if(! in_array($fileType , $allowed_types))
					{
						//echo "You need to upload word/excel/plain text/ images only <br>";
						$error_message = $error_message . "You need to upload word/excel/pdf/plain text/ images only <br>";
						$ok=0;
					}
				}
				
				
				
				if ($email=="") 
				{
						//echo "Enter the email address <br>";
						$error_message = $error_message ."Enter the email address <br>";
						$ok=0;
				}		
				//echo "here".$ok;
				//Here we check that $ok was not set to 0 by an error 
				if ($ok==0) 
				{ 
						//echo "Sorry your file was not uploaded <br>"; 
						$error_message = $error_message ."Sorry your file was not uploaded <br>"; 
						echo $error_message;
				} 
								

				//If everything is ok we try to upload it 
				
				else 
				{ 
									if(move_uploaded_file($tmpName, $target)) 
									{
									
									echo "The file ". basename( $fileName). " has been uploaded <br>"; 
									
									//Database Information 
										$dbhost = "localhost"; 
										$dbname = "astahost"; 
										$dbuser = "root"; 
										$dbpass = ""; 

									//Connect to database 
										mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error()); 
										mysql_select_db($dbname) or die(mysql_error()); 
										
									//insert file into the database
										$sql = "INSERT INTO upload_topic1 (name, email_id, type, size, topic_id, path, created) VALUES ('$fileName', '$email', '$fileType', '$fileSize', '$id', '$webpath1', NOW())";
										//echo $sql;
										mysql_query($sql) or die(mysql_error('Error, query failed'));
										mysql_close();
									}		
									
				} 
			
	}	
	

 ?>
	</div>
	<div id="right"></div>
	<div id="footer">
				<div align="center">Copyright © 2012 by Calaveras Station Literary Journal and the CSUS English Department </div>
	</div>
	</div>
	
</div>
</body>
</html>


 
 
 
 
 