<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = $emailCustomer;
    $names = "Order Confirmation";

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
    $mail->setFrom($email, $names);
    $mail->addAddress($emailCustomer);
    $mail->Subject = "Order Details";
    $mail->Body = 'Good day,'. " ". $name.".". " " .'We would like to inform you that you have successfully order our product'. " ". $product . ".". 
    " ". "With a quantity of ". " ".  $bottles." ". "product/s.". " ". "Mode of payment is". " ". $mop. "."." ". "Thank you have nice day.";


    if ($mail->send())
        echo "Mail Sent";

    else
        echo('Error sending the email');

?>