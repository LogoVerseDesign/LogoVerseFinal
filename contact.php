<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize inputs
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Get destination email from environment variable
    $to = getenv('CONTACT_EMAIL');
    if (!$to) {
        echo "Destination email is not configured.";
        exit;
    }

    // Prepare email
    $subject = "New Contact Form Submission";
    $headers = "From: noreply@logoversedesign.co.uk\r\n";
    $headers .= "Reply-To: $email\r\n";

    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
