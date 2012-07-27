<?php
	if(isset($_POST['admincurrenteditions'])) {
			header("Location:admin/admincurrenteditions.php");
	}
?>



<HTML>
<BODY>
	<script language="php">
	$mysql_link = mysql_connect("localhost", "root", ""); 
	mysql_select_db("astahost", $mysql_link);
	//if($react == "delete_user") {
	 if(isset($_POST['react'])){	
			$username=$_POST['username']; 
			//print $username;
			//if(isset($_POST['react'])){
			if($username) {
			//echo "hai";
					$query = "DELETE from tblusers WHERE username='$username' ";
					//$result = mysql_query($query, $mysql_link);
					  $result = mysql_query($query,$mysql_link);
					if(mysql_num_rows($result)) {
							print("<strong>$username</strong> successfully deleted<p>");
					}
			} else { 
					print("<strong>no users are available to delete yet, sorry.</strong><p>");
					}
	} 
	
	elseif(isset($_POST['react3'])){	
			$name=$_POST['name']; 
			if($name) {
					$query = "DELETE from upload_topic1 WHERE name='$name' ";
					 $result = mysql_query($query,$mysql_link);
					if(mysql_num_rows($result)) {
							print("<strong>$name</strong> successfully deleted<p>");
					}
			} else { 
					print("<strong>no users are available to delete yet, sorry.</strong><p>");
					}
	} 
	
	
	
	//elseif ($react == "add_user") {
	elseif (isset($_POST['react1'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			//if (isset($_POST['react1'])) {
			if(($username) and ($password)) {
					//echo "bye";
					$query = "INSERT INTO tblusers (username, password) VALUES ('$username', '$password');";
					//$query .= " '$username', '$password' )";
					mysql_query($query, $mysql_link);
			} else {
						print("<strong>either your user or password field was left blank</strong><p>");
					}
	}
	
	elseif (isset($_POST['react2'])) {
			$topicname=$_POST['newtopicname'];
			if($topicname) {
					//echo "bye";
					$query = "INSERT INTO topics (topic_name) VALUES ('$topicname');";
					mysql_query($query, $mysql_link);
			} else {
						print("<strong> your topicname field was left blank</strong><p>");
					}
	}
	
	
	
	</script>
	<form method="POST" action="admin.php"><div align="center"><center><p>Delete Existing Users <br>
	<input type="hidden" name="react" value="delete_user">
	<select name="username" size="1">
	<script language="php">
			//$mysql_link = mysql_connect("localhost", "root", ""); 
			//mysql_select_db("astahost", $mysql_link);
			$query = "SELECT username FROM tblusers ORDER BY id";
			//$query ="SELECT * FROM tblusers WHERE username='$username'";
			$result = mysql_query($query, $mysql_link);
			if(mysql_num_rows($result)) {
				// we have at least one user, so show all users as options in select form
					while($row = mysql_fetch_row($result))
					{
							print("<option value=\"$row[0]\">$row[0]</option>");
					}
			} else {
					print("<option value=\"\">No users created yet</option>");
					}
	</script> 
	</select><input type="submit" value="DELETE"></p></center></div>
	</form>
	<br>
	
	<form method="POST" action="admin.php"><div align="center"><center><p>Delete Current Submissions by Users <br>
	<input type="hidden" name="react3" value="delete_user">
	<select name="name" size="1">
	<script language="php">
	
			$query = "SELECT name FROM upload_topic1 ORDER BY id";
			$result = mysql_query($query, $mysql_link);
			if(mysql_num_rows($result)) {
				// we have at least one user, so show all users as options in select form
					while($row = mysql_fetch_row($result))
					{
							print("<option value=\"$row[0]\">$row[0]</option>");
					}
			} else {
					print("<option value=\"\">No users created yet</option>");
					}
	</script> 
	</select><input type="submit" value="DELETE"></p></center></div>
	</form>
	<br>
	
	
	<form method="POST" action="admin.php">
	<input type="hidden" name="react1" value="add_user">
	<div align="center"><center><p>ADD A New User<br>
	User: <input type="text" name="username" size="20"><br>
	Pass: <input type="text" name="password" size="20"><br>
	<input type="submit" value="ADD"></p></center></div>
	</form>
	<br>
	
	<form method="POST" action="admin.php">
	<input type="hidden" name="react2" value="add_topic">
	<div align="center"><center><p>ADD A New Topic<br>
	 <input type="text" name="newtopicname" size="20"><br>
	<input type="submit" value="ADDNEWTOPIC"></p></center></div>
	</form>
	<br>	
	
	
	
	<form method="POST" action="admin.php">
					 <center>View/Download the current Selected Topics <br />
					<input type="hidden"  name="admincurrenteditions" value="submitform" />
					<center> <input type="submit" name ="submit" value="view">
	</form>
	<br>	
	<br>
	
	
		
	<form enctype="multipart/form-data" action="admin.php" method="post">
					 <center>Please choose an Annual Edition file to upload<br /><br /><input name="uploaded" type="file" /><br />
					 
					 <input type="hidden" id="action" name="action1" value="submitform" />
					<!-- <input type="hidden" id="topic_id" name="topic_id" value="<? /* php echo $id; */ ?>" /> -->
					 <center> <input type="submit" name ="submit" value="Upload" />
	</form>
	
	<?php
 
	 if(isset($_POST['action1'])){ 
	
				$fileName = $_FILES['uploaded']['name'];
				$tmpName  = $_FILES['uploaded']['tmp_name'];
				$fileSize = $_FILES['uploaded']['size'];
				$fileType = $_FILES['uploaded']['type'];
				//$email = $_POST['email'];
				$target = "/wamp/www/dream_calaveras/active_backup@3.19.2012_11am/journal_editions/editions/";
				$webpath = "/dream_calaveras/active_backup@3.19.2012_11am/journal_editions/editions/";
				
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
										//$sql = "INSERT INTO upload_topic1 (name, email_id, type, size, topic_id, path, created) VALUES ('$fileName', '$email', '$fileType', '$fileSize', '$id', '$webpath1', NOW())";
										$sql = "INSERT INTO download_annual_editions (name, mime, size, path, created) VALUES ('$fileName', '$fileType', '$fileSize', '$webpath1', NOW())";
										//echo $sql;
										mysql_query($sql) or die(mysql_error('Error, query failed'));
										mysql_close();
									}		
									
				} 
			
	}	
	

 ?>
	 
	<div align="center"><center><p>CLICK LOGOUT FOR GETTING BACK TO HOME PAGE<br>
	<form method="POST" action="logout.php">
	<input type="submit" value="Logout">
	</form>	 
	  
</BODY>
</HTML>