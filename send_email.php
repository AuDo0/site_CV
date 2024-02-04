<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Specify your email and subject
    $toEmail = "doriat.aurelien@gmail.com"; // Change this to your own email address
    $subject = "New contact from $name";

    // Prepare the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($toEmail, $subject, $body, $headers)) {
        // Email sent successfully
        echo "<p>Thank you for your message, $name. We will get back to you soon.</p>";
    } else {
        // Email failed to send
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
} else {
    // Not a POST request, display a generic error or redirect
    echo "<p>There was a problem with your submission, please try again.</p>";
}
?>

