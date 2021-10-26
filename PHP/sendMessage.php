<?php
ob_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
}

if (!isset($_POST["submit"])) {
    header("location: ../index.php");
}

include "../config/connection.php";
require "../vendor/autoload.php";


$fullName = $_POST["fullName"];
$telNo = $_POST["telNo"];
$email_address = $_POST["email_address"];
$subject = $_POST["subject"];
$message = $_POST["message"];


/* create object */
$phpmailer = new \SendGrid\Mail\Mail();

$phpmailer->setFrom(EMAIL_SENDER, NAME_SENDER);
$phpmailer->setSubject("Lakbay Travel and Tour");
$phpmailer->addTo($email_address, $fullName);
$phpmailer->addContent(
    "text/html",
    " <p style='font-family:Segoe UI;'>
                Dear {$fullName},<br>
                we have received your inquiry.<br>
                We are greatful that you chose our service!<br>
                We are pleased to serve you! Thank you for choosing Lakbay Travel and Tour!
            </p>"
);

$sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($phpmailer);
    header("location: ../pages/message_received.php");
    /* print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n"; */
} catch (Exception $e) {
    echo '<h2>Caught exception:<h2> <br>' . $e->getMessage() . "\n";
    header("location: ../pages/message_failed.php");
}
ob_end_flush();
