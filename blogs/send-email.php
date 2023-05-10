<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Set the recipient email address
    $to = "estefanovcontact@gmail.com";

    // Set the email subject
    $email_subject = "New message from $name: $subject";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $name <$email>\r\n";
    $email_headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_content, $email_headers)) {
        // Email sent successfully, redirect to success page
        header("Location: thank-you.html");
        exit;
    } else {
        // Error sending email, redirect to error page
        header("Location: error.html");
        exit;
    }
}
?>
