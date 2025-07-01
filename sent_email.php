<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Correct case-sensitive file paths
require 'D:/xampp/htdocs/YuvanConstructions/YuvanConstructions/PHPMailer/Exception.php';
require 'D:/xampp/htdocs/YuvanConstructions/YuvanConstructions/PHPMailer/PHPMailer.php';
require 'D:/xampp/htdocs/YuvanConstructions/YuvanConstructions/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = ' yuvangroup10@gmail.com';  // your email
        $mail->Password   = 'xswxvqtdclwnefgx';  // your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom(' yuvangroup10@gmail.com', 'Yuvan Construction Website');
        $mail->addAddress(' yuvangroup10@gmail.com'); // recipient (same as sender here)

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body    = "
            <h2>New Message Received</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        header("Location: index.php?success=1");
        exit;
    }  catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
    }
    
}
?>
