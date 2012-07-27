<?php


// Get the ID
    $topic_id = $_GET['id'];
	$path = $_GET['idd'];
	$email_id = $_GET['iddd'];
	$name = $_GET['idddd'];
    $type = $_GET['iddddd'];
	$size = $_GET['idddddd'];
    
        ///Database Information 
										$dbhost = "localhost"; 
										$dbname = "astahost"; 
										$dbuser = "root"; 
										$dbpass = ""; 

		//Connect to database 
										mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error()); 
										mysql_select_db($dbname) or die(mysql_error()); 
										
        //insert file into the database
						$sql = "INSERT INTO current_selected_submissions(name, email_id, type, size, topic_id, path, created) VALUES ('$name', '$email_id', '$type', $size, '$topic_id', '$path', NOW())";
						//echo $sql;
						if(mysql_query($sql))
						{
							echo "successfully submitted to the database";
						}
						else{
								die(mysql_error('Error, query failed'));
						}
						mysql_close();
							
 
        
        

?>