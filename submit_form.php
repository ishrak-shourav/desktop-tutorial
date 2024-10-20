<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the form fields (simple validation)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Set the recipient email address
    $to = "your-email@example.com";  // Replace with your email address

    // Set the email subject
    $subject = "New Contact Form Submission from Orchid Associate";

    // Create the email content
    $email_content = "Name: $name\n";
    $email_content = "Email: $email\n\n";
    $email_content = "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Success message
        echo "Thank you! Your message has been sent.";
    } else {
        // Failure message
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
}
?>
