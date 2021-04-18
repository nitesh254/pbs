<?php
$toEmail = "info@punebusinessschool.com";
$mailHeaders = "From: " . $_POST["w3lName"] . "<". $_POST["w3lSender"] .">\r\n";
$subject = "Pune Business School Enquiry";
$contents = "Name:" . " " . $_POST["w3lName"]  . "\r\n" ."Contact Number:" . " " .  $_POST["w3lnum"] . "\r\n" . "Enquiry:" . " " . $_POST["w3lMessage"]  ;
if(mail($toEmail, $subject, $contents, $mailHeaders)) {
print "<p class='success'>Message Sent Successfully.</p>";
} else {
print "<p class='Error'>Problem in Sending Enquiry.</p>";
}
?>