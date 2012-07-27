<?php

if(isset($_REQUEST['submit'])) {
$selected_value = $_REQUEST['mydropdown'];
		if($selected_value == 1){
			header("Location:email.php");
		}
		else($selected_value == 0){
			header("Location:jemail1.php");
		}
		
		
		
}

?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
    <div id="bodyArea">
	
	<div id="left"><body>
		<form name="myform" action="emailselector.php" method="POST">
		<div align="center"> <center><p><b>Please Select your judgment</b><br>
		<br>
			<select name="mydropdown">
				<option value="1">Selected</option>
				<option value="0">NotSelected</option>
			</select>
		</div>
		<Center> <input type="submit" name="submit" value="Download"> </center>
		</form>
	</div>
	
	
</div>
</body>
</html>

</body>
</html>
	
	
	
