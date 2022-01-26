<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = $emails;
    $names = "Forgot Password";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ajnarag25@gmail.com";
    $mail->Password = "ajnarag25";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $names);
    $mail->addAddress($emails);
    $mail->Subject = "Forgot Password OTP Verification";
    $mail->Body = 'Good day,'. " ". $getFirstname."."." "."We would like to inform you that you access forgot password."." "
    ."This your one time otp:"." ". $setOTP." "." for verification of your account."." "."Thank you have a nice day.";


    if ($mail->send())
        echo "Mail Sent";

    else
        // echo('Error sending the email');

?>