<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        echo "Invalid email format";
        exit;
    }

    // Validate other fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // Missing fields
        echo "Please fill in all the fields";
        exit;
    }

    $to = "anushkahrms@gmail.com";

    // Set the email subject
    $emailSubject = "Contact Form Submission: $subject";

    // Build the email content
    $emailBody = "Name: $name\n";
    $emailBody .= "Email: $email\n\n";
    $emailBody .= "Message:\n$message\n";

    // Set email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $emailSubject, $emailBody, $headers)) {
        // Success message
        echo "Your message has been sent!";
    } else {
        // Failure message
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
