<?php
//$hostname_connection = "localhost";
//$database_connection = "astahost";
//$username_connection = "username";
//$password_connection = "password";
//$connection = mysql_connect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

//Database Information 
		$dbhost = "localhost"; 
		$dbname = "astahost"; 
		$dbuser = "root"; 
		$dbpass = ""; 

		//Connect to database 

		mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error()); 
		mysql_select_db($dbname) or die(mysql_error()); 







?>
