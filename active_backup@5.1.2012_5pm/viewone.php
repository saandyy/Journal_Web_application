
<html>
<head>
<head>
<body>
<div align="center"><center><p> <b> CLICK OPEN TO VIEW  </b> <br>
<?php

			session_start();
			//echo $_SESSION['topic_id'];
			//$id = $_REQUEST['topic_id'];
			//echo $id;

			$loginsid= $_GET['id'];

			// Connect to the database
			$dbLink = new mysqli('localhost', 'root', '', 'astahost');
			if(mysqli_connect_errno()) {
				die("MySQL connection failed: ". mysqli_connect_error());
			}
			 
			 //$topic_idd = $_SESSION['topic_id'];
			// Query for a list of all existing files
			//$sql = 'SELECT `id`, `name`, `email_id`, `type`, `size`, `topic_id`, `path`, `created` FROM `download_annual_editions` where `topic_id` ='. $topic_idd ;
			$sql = 'SELECT  `path` FROM `download_annual_editions` where `id` ='. $loginsid ;
			//$sql = 'SELECT `id`, `name`, `email_id`, `type`, `size`, `path`, `created` FROM `upload_topic1`';
			$result = $dbLink->query($sql);
			 
			// Check if it was successfull
			if($result) {
				// Make sure there are some files in there
				if($result->num_rows == 0) {
					echo '<p>There are no files in the database</p>';
				}
				else {
					 
					// Print each file
					while($row = $result->fetch_assoc()) {
						echo "
							<tr>
								<td><a href='{$row['path']}'>Open</a></td>
							</tr>";
					}
				
					// Close table
					echo '</table>';
				}
			 
				// Free the result
				$result->free();
			}
			else
			{
				echo 'Error! SQL query failed:';
				echo "<pre>{$dbLink->error}</pre>";
			}
			 
			// Close the mysql connection
			$dbLink->close();
?>




<div align="center"><center><p> <b> CLICK LOGOUT FOR GETTING BACK TO HOME PAGE </b> <br>
	<form method="POST" action="logout.php">
	<input type="submit" value="Logout">
	</form>
</div>
</body>
</html>