$to = 'contact@logoversedesign.co.uk';
$subject = 'New Contact Form Submission';
$headers = "From: noreply@logoversedesign.co.uk\r\n";
$headers .= "Reply-To: $email\r\n";

$body = "You have received a new message from your website contact form.\n\n" .
        "Name: $name\n" .
        "Email: $email\n\n" .
        "Message:\n$message\n";

if (mail($to, $subject, $body, $headers)) {
    echo "Message sent successfully!";
} else {
    echo "Message could not be sent.";
}
