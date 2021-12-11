<?php
if (isset($_POST['submitSupplierForm'])) {
    $product = $_POST['pName'];
    $stock = $_POST['stocks'];
    $quants = $_POST['qtytobeordered'];
}
?>

<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = "vhoenix117@gmail.com";
    $name = "Request for Re-stock";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ajnarag25@gmail.com";
    $mail->Password = "";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress(address:'vhoenix117@gmail.com');
    $mail->Subject = "Request";
    $mail->Body = 'We would like to request for restock for our product'." ".$product."."." ".
    "The total stock that we have now is"." ".$stock."."." "."We are requesting for a total of"." ".$quants." ". 
    "for our product."." "."Thank you have a nice day.";

    if ($mail->send())
        echo "Mail Sent";

    else
        #echo('Error sending the email');

?>


<script>
    window.location.href = "stocktaking.php";
</script>

