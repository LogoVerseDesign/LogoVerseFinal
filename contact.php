if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Use environment variable for the destination email
    $to = getenv('CONTACT_EMAIL');
    $subject = "New Contact Form Submission";
    $headers = "From: noreply@logoversedesign.co.uk\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Email body content
    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
