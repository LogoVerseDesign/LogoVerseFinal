<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@logoversedesign.co.uk'; // Your email
    $mail->Password = '$1$WuavVRaJ$4vUvlY/4Jd0IQVhJwUmMr0'; // App password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('contact@logoversedesign.co.uk', 'Logoverse Contact');
    $mail->addAddress('contact@logoversedesign.co.uk', 'Logoverse Team'); // Destination email
    $mail->addReplyTo('example@gmail.com', 'User Name'); // Optional: reply-to address

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = 'This is a test message.';
    $mail->AltBody = 'This is a plain-text message body.';

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
