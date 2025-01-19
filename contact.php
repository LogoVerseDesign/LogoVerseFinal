$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'contact@logoversedesign.co.uk'; // Your Google Workspace email
$mail->Password = 'your-app-password'; // App password generated in Step 2b
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
$mail->Port = 587;
