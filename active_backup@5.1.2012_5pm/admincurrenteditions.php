<?php

session_start();



// Connect to the database
$dbLink = new mysqli('localhost', 'root', '', 'astahost');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
 
// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `email_id`, `type`, `size`, `topic_id`, `path`, `created` FROM `current_selected_submissions`';
//$sql = 'SELECT `id`, `name`, `email_id`, `type`, `size`, `path`, `created` FROM `upload_topic1`';
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Id</b></td>
					<td><b>Name</b></td>
                    <td><b>Email-Id</b></td>
					<td><b>topic_id</b></td>
					<td><b>Created</b></td>
					<td><b>Download</b></td>
					<td><b>Open</b></td>
					<td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['id']}</td>
					<td>{$row['name']}</td>
                    <td>{$row['email_id']}</td>
					 <td>{$row['topic_id']}</td>                 
					<td>{$row['created']}</td>
					<td><a href='get_file.php?id={$row['id']}'>Download</a></td>
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
<html>
<head>
<head>
<body>
<div align="center"><center><p> <b> CLICK LOGOUT FOR GETTING BACK TO HOME PAGE </b> <br>
	<form method="POST" action="logout.php">
	<input type="submit" value="Logout">
	</form>
</div>
</body>
</html>