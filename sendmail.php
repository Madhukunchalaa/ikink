<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $city = htmlspecialchars($_POST['city']);
    $insurance = htmlspecialchars($_POST['insurance']);
    $description = htmlspecialchars($_POST['description']);

    // Recipient email
    $to = "madhkunchala@"; // Replace with your email
    $subject = "New Insurance Inquiry from " . $name;

    // Email content
    $message = "
    <html>
    <head>
      <title>Insurance Inquiry</title>
    </head>
    <body>
      <p><strong>Full Name:</strong> $name</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Contact Number:</strong> $contact</p>
      <p><strong>City:</strong> $city</p>
      <p><strong>Insurance Type:</strong> $insurance</p>
      <p><strong>Description:</strong><br>$description</p>
    </body>
    </html>
    ";

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to thank you page on success
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>
