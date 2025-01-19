<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer or manually

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Destination email address
    $to = "contact@logoversedesign.co.uk"; // Replace with your email

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.yourdomain.com'; // Replace with your SMTP server (e.g., smtp.gmail.com)
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@yourdomain.com'; // SMTP username (replace with your email address)
        $mail->Password = 'your-email-password';      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Content
        $mail->setFrom('noreply@logoversedesign.co.uk', 'Logoverse Contact Form');
        $mail->addAddress($to); // Add recipient email
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body = "You have received a new message from your website contact form.\n\n" .
                      "Name: $name\n" .
                      "Email: $email\n\n" .
                      "Message:\n$message\n";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
