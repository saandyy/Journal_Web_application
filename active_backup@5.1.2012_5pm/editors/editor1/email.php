<?php
session_start();
$address = $_GET['id'];
	//echo $address;
$tempfromaddress = $_GET['idd'];
//echo $fromaddress;
//echo $address;




//date_default_timezone_set('America/Toronto');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "YOU ARE SELECTED.";
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "gmailusername	";  // GMAIL username
$mail->Password   = "gmailpassword";            // GMAIL password

	
	if($tempfromaddress == 1)
	{
		echo $tempfromaddress;
		$mail->SetFrom('editor1@gmail.com', 'EDITOR1');
		
	}
	
	
	elseif($tempfromaddress == 2)
	{
		$mail->SetFrom('editor2@gmail.com', 'EDITOR2');
	}
	
	elseif($tempfromaddress == 3)
	{
		$mail->SetFrom('editor3@gmail.com', 'EDITOR3');
	}
	
	
	elseif($tempfromaddress == 4)
	{
		$mail->SetFrom('editor4@gmail.com', 'EDITOR4');
	}
	
	elseif($tempfromaddress == 6)
	{
		$mail->SetFrom('editor6@gmail.com', 'EDITOR6');
	}
	
	elseif($tempfromaddress == 7)
	{
		$mail->SetFrom('editor7@gmail.com', 'EDITOR7');
	}
	

$mail->Subject    = "topic selection status";


$mail->MsgHTML($body);



$mail->AddAddress($address, "APPLICANT");

//$mail->Send();

if($mail->Send()) {
  
  echo "Message sent!";
 // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Mailer Error: " . $mail->ErrorInfo;
}


?>