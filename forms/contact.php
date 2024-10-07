<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate fields
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $to = "your-email@example.com"; // Replace with your email
        $headers = "From: " . $email;
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Your message has been sent.";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
