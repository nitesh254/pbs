<?php

date_default_timezone_set('Asia/Kolkata');
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->Host = "punebusinessschool.com";
// optional
// used only when SMTP requires authentication
$mail->Username = 'info@punebusinessschool.com';
$mail->Password = 'Pune123*';
$mail->Port = 465 ;
// $mail->IsSMTP(); // enable SMTP/
$mail->SMTPDebug = 4; // debugging: 0 = off debugging , 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl';



if($_POST){

//    function post_captcha($user_response) {
//        $data = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LczN8MUAAAAAD6foxW4AyC9iVnVNJcThWqyntl1&response={$user_response}");
//        //$data = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LczN8MUAAAAAD6foxW4AyC9iVnVNJcThWqyntl1&response={$user_response}");
//        //echo $data;
//        //exit;
//        return json_decode($data);
//    }


    // Call the function post_captcha
//    $res = post_captcha($_POST['gRecaptchaResponse']);

//    if (!$res->success) {
//        // What happens when the CAPTCHA wasn't checked
//        echo 'Please make sure you check the security CAPTCHA box.<br>';
//    }else{
        $userName = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $source = (isset($_POST['source']) && $_POST['source']!='') ? $_POST['source'] : 'Website';
        $media = (isset($_POST['media']) && $_POST['media']!='')? $_POST['media'] : 'Website';
        $campaign = (isset($_POST['campaign']) && $_POST['campaign']!='') ? $_POST['campaign'] : 'Website';

        $email_body =  'Name : '.$userName .'<br>';
        $email_body .= 'Mobile Number : '.$mobile .'<br>';
        $email_body .= 'Email : '.$email .'<br>';
        // echo $email_body;exit();
        $mail->setFrom('info@punebusinessschool.com', 'PBS Info');
        $mail->addAddress('info@punebusinessschool.com', 'PBS Pune');
        $mail->Subject  = 'PBS : Website Download Brochure Info ';
        $mail->Body     = $email_body;
        $mail->IsHTML(true);
        insertLeadInToDatabase($userName,$mobile,$email,$source,$media,$campaign);
//        if(!$mail->send()) {
//            echo 'Message was not sent.';
//            echo 'Mailer error: ' . $mail->ErrorInfo;
//        }else{
            /*echo 'Thank you for filling out your information!<br>We appreciate you contacting us. One of our colleagues will get back to you shortly within 24 hours.';*/
            echo "<script language='javascript'>window.location.href='thankYouBrochure.php'</script>";
//        }
//    }
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