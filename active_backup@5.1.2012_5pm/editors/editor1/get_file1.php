<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'astahost');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "
            SELECT  `path` FROM `upload_topic1` WHERE `id` = {$id}";
        $result = $dbLink->query($query);
		//list($name, $mime, $size, $filePath) = mysql_fetch_array($result);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
               // header("Content-Type: ". $row['type']);
                //header("Content-Length: ". $row['size']);
               // header("Content-Disposition: attachment; filename=". $row['name']);
 
                // Print data
                echo $row['path'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>

<html>
<head>
<head>
<body>
<div align="center"><center><p>CLICK BACK FOR GETTING BACK TO PREVIOUS PAGE<br>
	<form method="POST" action="editor_topic1.php">
	<input type="submit" value="BACK">
	</form>
</div>
</body>
</html>