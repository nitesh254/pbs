<?php
$toEmail = "info@punebusinessschool.com";
$mailHeaders = "From: " . $_POST["w3lName"] . "<". $_POST["w3lSender"] .">\r\n";
$subject = "Facebook | PBS Master Class Registration";
$contents = "Name:" . " " . $_POST["w3lName"]  . "\r\n" ."Contact Number:" . " " .  $_POST["w3lnum"] . "\r\n" . "Enquiry:" . " " . $_POST["w3lMessage"]  ;
if(mail($toEmail, $subject, $contents, $mailHeaders)) {
     //print "<p class='Error'>Message send successfully.</p>";
 //window.location.replace("https://punebusinessschool.com/thankyou.php");
//header('Location: https://punebusinessschool.com/thankyou.php'); 
//exit();
  echo '<script>window.location.href = "thankyou.php";</script>';

} else {
print "<p class='Error'>Problem in Sending Enquiry.</p>";
}
?>