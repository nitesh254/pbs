<?php

require_once "./smtp-phpmailer/includ-mailer.php"; //include phpmailer class phpmailer/
    
    $ccdtl = "punebschool@gmail.com";
    $fromdtl = "punebschool@gmail.com";
    $to = "punebschool@gmail.com";
    
 

    
  
    
   
    // Send To
   
   // $result1 = $mail->Send(); // Send!
    // $resmessage1 = $result1 ? 'Successfully Sent!' : 'Sending Failed!';



if($_POST){

        $userName = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $source = (isset($_POST['source']) && $_POST['source']!='') ? $_POST['source'] : 'Website';
        $media = (isset($_POST['media']) && $_POST['media']!='')? $_POST['media'] : 'Website';
        $campaign = (isset($_POST['campaign']) && $_POST['campaign']!='') ? $_POST['campaign'] : 'Website';

        $email_body =  'Name : '.$userName .'<br>';
        $email_body .= 'Mobile Number : '.$mobile .'<br>';
        $email_body .= 'Email : '.$email .'<br>';
       
        $mail->SetFrom($fromdtl,"PBS Apply now");
        $mail->AddCC($ccdtl);
        $subject = "PBS Apply Now Form Details";
   //     $mail->ClearAddresses(); // each AddAddress add to list - to clear all the receipints
    
        $mail->Subject = $subject; // Subject (which isn't required)
  //      $mail->MsgHTML($message);
        $mail->AddAddress($to); // Where to send it "
    
       // $mail->setFrom('info@punebusinessschool.com', 'PBS Info');
     //   $mail->addAddress('info@punebusinessschool.com', 'PBS Pune');
  //      $mail->Subject  = 'PBS : Website Download Brochure Info ';
        $mail->Body     = $email_body;
        $mail->IsHTML(true);
        insertLeadInToDatabase($userName,$mobile,$email,$source,$media,$campaign);

            echo "<script language='javascript'>window.location.href='thankYouBrochure.php'</script>";

}else{
    echo 'please post';
}

function insertLeadInToDatabase($userName,$mobile,$email,$source,$media,$campaign)
{

    $hostname='localhost';
    $username='u837526902_pbs';
    $password='Pune123*';
    $dbname='u837526902_PBS_Database';

    try {

        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO brochure_downloads (user_name, email, mobile, source, campaign, media, created_at, updated_at)
			VALUES ('".$userName."','".$email."','".$mobile."','".$source."','".$campaign."','".$media."' ,'".$date."','".$date."')";

        if ($dbh->query($sql)) {
            // header('Location: #');
            // echo "Thank You";
        }

        $dbh = null;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>