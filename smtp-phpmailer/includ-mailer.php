<?php

require "./smtp-phpmailer/class.phpmailer.php"; //include phpmailer class phpmailer/

// Instantiate Class
$mail = new PHPMailer(true);

// Set up SMTP
$mail->IsSMTP(); // Sets up a SMTP connection
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // Connection with the SMTP does require authorization
$mail->SMTPSecure = "ssl"; // Connect using a TLS connection
$mail->Host = "smtp.gmail.com"; //Gmail SMTP server address
$mail->Port = 465; //Gmail SMTP port
//$mail->SMTPSecure = "ssl";

$mail->Encoding = '7bit';

// Authentication
$mail->Username = "punebschool@gmail.com"; // Your full Gmail address
$mail->Password = "Pune123*"; // Your Gmail password

// Compose
/*
$mail->SetFrom($_POST['emailid']); //, $_POST['fullname']
$mail->AddReplyTo($_POST['emailid']); //, $_POST['fullname']
$mail->AddCC("info@dmcfs.in");
$mail->AddBCC("gephels@gmail.com");
$mail->Subject = "Latest form enquiry using SMTP";      // Subject (which isn't required)
$mail->MsgHTML($message);

// Send To
$mail->AddAddress("info@dmcfs.in"); // Where to send it - Recipient , " "
$result = $mail->Send();        // Send!
$resmessage = $result ? 'Successfully Sent!' : 'Sending Failed!';
unset($mail);

//=========== to clear the receipints

$mail->ClearAllRecipients( ); // clear all

// clear addresses of all types
$mail->ClearAddresses();  // each AddAddress add to list
$mail->ClearCCs();
$mail->ClearBCCs();
then im doing just this: (not using CC or BCC, $toaddress is just an array of recipients)

foreach($toaddress as $key=>$val) { $mail->AddAddress( $val ); }

//
 */

?>
