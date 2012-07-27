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
<script>
function validate(form) {
fail = validatefirstname(form.firstname.value)
fail += validatelastname(form.lastname.value)
fail += validateusername(form.username.value)
fail += validatepassword(form.password.value)
if (fail == "") return true
else { alert(fail); return false }
}

function validatefirstname(field) {
	if (field == "") return "No Firstname was entered.\n"
		return ""
	}
function validatelastname(field) {
	if (field == "") return "No Lastname was entered.\n"
		return ""
	}
function validateusername(field) {
	if (field == "") return "No Username was entered.\n"
		else if (field.length < 5)
			return "Usernames must be at least 5 characters.\n"
		else if (/[^a-zA-Z0-9_-]/.test(field))
			return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"
	return ""
}
function validatepassword(field) {
	if (field == "") return "No Password was entered.\n"
		else if (field.length < 6)
			return "Passwords must be at least 6 characters.\n"
		else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) ||
			!/[0-9]/.test(field))
			return "Passwords require one each of a-z, A-Z and 0-9.\n"
	return ""
}

params = "url=oreilly.com"
request = new ajaxRequest()
request.open("POST", "urlpost.php", true)
request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					document.getElementById('info').innerHTML =
					this.responseText
				}
				else alert("Ajax error: No data received")
			}
			else alert( "Ajax error: " + this.statusText)
	}
}
request.send(params)





function ajaxRequest()
	{
		try // Non IE Browser?
		{
			var request = new XMLHttpRequest()
		}
		catch(e1)
		{
			try // IE 6+?
			{
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
			catch(e2)
			{
				try // IE 5?
				{
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
				catch(e3) // There is no Ajax Support
				{
					request = false
				}
			}
		}
	return request
	}
</script>


</script>


</head>

<body>
<div id="pamwrapper">
    <div id="logo"><a href="index.html"><img src="images/sample2.jpg" alt="mystic" border="0" /></a></div>
    <div id="navigation"><a href="index.html" class="style1">Home</a> | <a href="news.html" class="style1">News</a> |<a href="staff.html" class="style1"> Staff </a>| <a href="sale.html" class="style1">Sale</a> | <a href="photogallery.html" class="style1">Gallery</a> | <a href="contacts.html" class="style1">Contact Us</a> </div>
  	<div id="headerImg"> </div>
	<div id="bodyArea">
	
	<div id="left">
	  <p>
		<form action="" method="post" onSubmit="return validate(this)">
				<center> Username  <input type="text" maxlength="32" name="username"> <br>
				<br>
				<center> Password <input type="password" maxlength="32" name="password"> <br>
				<br>
				<center> Firstname  <input type="text" maxlength="16" name="firstname"> <br>
				<br>
				<center> Lastname  <input type="text" maxlength="12" name="lastname"> <br>
				<br>
				
			<center> <input type="submit" name="submit" value="Register">
		</form>
	</p>
	  
	  <?php



//Database Information
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="astahost";
	
//Connect to database 
	mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error()); 
	mysql_select_db($dbname) or die(mysql_error());


if(isset($_POST['submit'])) {	

   $username = $_POST['username'];
   $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
//	$email1=$_POST['email']
   
   // lets check to see if the username already exists 
	$checkuser = mysql_query("SELECT username FROM tblusers WHERE username='$username'"); 
	$username_exist = mysql_num_rows($checkuser); 

	$ok=1; 
	$error_message="";
	if($username_exist > 0){ 
		$error_message = $error_message . "I'm sorry but the username you specified has already been taken.Please pick another one."; 
		unset($username); 
		$ok=0; 
	//	exit(); 
	} 
	
	
	//check for the empty fields
	if($username == "") { $error_message = $error_message ."Username should not be empty <br>"; 
	$ok=0; 
	}
	
	if($password == "") {$error_message = $error_message ."Password should not be empty <br>";
	$ok=0; 
	}
	
	if($firstname  == "") { $error_message = $error_message . "Firstname should not be empty <br>"; 
	$ok=0; 
	}
	
	if($lastname  == "") { $error_message = $error_message . "Lastname should not be empty <br>"; 
	$ok=0; 
	}
	
	if ($ok==0) 
				{ 
						//echo "Sorry your file was not uploaded <br>"; 
						$error_message = $error_message ."Sorry your file is not registered <br><br>"; 
						echo $error_message;
				} 
	
	// lf no errors present with the username 
	// use a sql to insert the data into the database. 
   else {
   $sql = "INSERT INTO tblusers (username, password, firstname, lastname) VALUES ('$username', '$password','$firstname','$lastname');";
   mysql_query($sql) or die(mysql_error());
   mysql_close();    
   echo "You have successfully Registered"; 
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
