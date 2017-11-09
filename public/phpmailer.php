<?php 
include "phpmailer/class.phpmailer.php";

$mail = new PHPMailer();
$recipiant = "fadi.nairat.2010@gmail.com";
$message = "HELLO MSG"	;
$attachment = "";

$mail->IsSMTP();  // telling the class to use SMTP
$mail->IsHTML(true);
$mail->CharSet = "UTF-8";
$mail->SMTPAuth   = true; // SMTP authentication
$mail->Host       = "46.43.66.107"; // SMTP server
$mail->Port       = 25; // SMTP Port
// $mail->SMTPSecure = 'tls';
$mail->Username   = "noreply@agbusinesshub.ps"; // SMTP account username
$mail->Password   = "noreply_@)!&";        // SMTP account password

if($attachment !="") $mail->AddAttachment(""); //****HERE'S MY MAIN PROBLEM!!!
$mail->SetFrom("noreplay@agbusinesshub.ps", "Project22"); // FROM
//$mail->AddReplyTo('fadi@intertech.ps', 'Dom'); // Reply TO

$mail->AddAddress("fadi.nairat.2010@gmail.com", "Fadi Neirat"); // recipient email
$mail->Subject    = "New Project22"; // email subject
$mail->Body       = "HELLO BODY";
$mail->SMTPDebug = 2;
if(!$mail->Send()) {
	//echo 'Message was not sent.';
	echo 'Mailer error: ' . $mail->ErrorInfo;
	return 0;
} 
else {
	echo 'Message has been sent.';
	return 1;
}
return 0;
?>