<?php

function goback()
{
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;
}


// GET ENTERED EMAIL ADDRESS
//===================================== -->

if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = '';}

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = '';}

if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = '';}

if ((isset($_POST['emailaddress'])) && (strlen(trim($_POST['emailaddress'])) > 0)) {
	$emailaddress = stripslashes(strip_tags($_POST['emailaddress']));
} else {$emailaddress = '';}


$emailaddress = $emailaddress;

ob_start();
?>

<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="0" cellspacing="2" cellpadding="2">
  <tr bgcolor="#ffffff">
    Contact Form Submission from Mobile Landing Page:
  </tr>
  
  <tr bgcolor="#ffffff">
    <td>Email</td>
    <td><?=$email;?> <?=$email1;?></td>
  </tr>
  
  <tr bgcolor="#ffffff">
    <td>Name</td>
    <td><?=$name;?> <?=$name1;?></td>
  </tr>
  
  <tr bgcolor="#ffffff">
    <td>Comment</td>
    <td><?=$message;?> <?=$message1;?></td>
  </tr>
  
</table>
</body>
</html>

<?
$body = ob_get_contents();

$to = ''.$emailaddress.'';
$email = ''.$emailaddress.'';
$fromaddress = "".$emailaddress."";
$fromname = "Message from Mobile Landing Page";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "".$emailaddress."";
$mail->FromName = "Mobile Landing Page Contact Form";
$mail->AddAddress("".$emailaddress."","Name 1");
$mail->AddAddress("".$emailaddress."","Name 2");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Message from Mobile Landing Page";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient 	= ''.$emailaddress.'';
	$subject 	= 'Contact form failed';
	$content 	= $body;	
  mail($recipient, $subject, $content, "From: ".$emailaddress."\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}

goback();