<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = "sample@gmail.com";
    $name = "Critical Stock Meet";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "sample@gmail.com";
    $mail->Password = "";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress(address:'sample@gmail.com');
    $mail->Subject = "Alert";
    $mail->Body = 'We would like to inform you that '.$_SESSION['name']." "."the total quantity now is"." ".$_SESSION['quants']."."." ".
    "Please make sure to add more stocks or request immediately in your supplier."." "."Thank you have nice day";

    if ($mail->send())
        echo "Mail Sent";

    else
        echo('Error sending the email');


?>