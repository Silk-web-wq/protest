<?php
// Collecting data from the form
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Validate and sanitize user input
if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Sender and recipient email addresses
$email_from = 'Althabti556@gmail.com'; // Your email address
$email_subject = 'New Form Submission';
$email_body = "User Name: $name\n".
              "User Email: $visitor_email\n".
              "Subject: $subject\n".
              "User Message: $message\n";

$to = 'alaaalyazidi59@gmail.com'; // Recipient email address

// Email headers
$headers = "From: $email_from\r\n";
$headers .= "Reply-To: $visitor_email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Sending the email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Redirect to thank you/contact page on success
    header("Location: contact.html");
    exit();
} else {
    // Show an error message if email fails to send
    echo "Sorry, something went wrong. Please try again later.";
}
?>







