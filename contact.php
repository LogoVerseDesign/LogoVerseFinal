<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize the form inputs
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email configuration
    $to = 'contact@logoversedesign.co.uk'; // Your email address
    $subject = 'New Contact Form Submission';
    $headers = "From: noreply@logoversedesign.co.uk\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Email body content
    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent.";
    }
} else {
    // Handle cases where the script is accessed directly
    echo "Invalid request method.";
}
?>
