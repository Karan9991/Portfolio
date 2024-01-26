<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'afreelance67@gmail.com';
        $mail->Password = 'tgkyluhclkxiucgt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('afreelance67@gmail.com', 'Your Name');
        $mail->addAddress('karan74406@gmail.com', 'Recipient Name');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        // Send the email
        $mail->send();

        // If the email is sent successfully, redirect to the form with success status
        header('Location: index.php?status=success');
        exit;
    } catch (Exception $e) {
        // If an error occurs while sending the email, redirect to the form with error status
        header('Location: index.php?status=error');
        exit;
    }
} else {
    // If the form is not submitted, redirect the user back to the form or display an error message
    header('Location: index.php');
    exit;
}
?>
