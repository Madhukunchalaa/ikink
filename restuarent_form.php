<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['full-name']);
    $companyName = htmlspecialchars($_POST['company-name']);
    $contactNumber = htmlspecialchars($_POST['contact-number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;

    // Collect checkbox values (coverage)
    $coverage = isset($_POST['coverage']) ? implode(", ", $_POST['coverage']) : 'None Selected';

    // Check if email is valid
    if (!$email) {
        echo "Invalid email address.";
        exit();
    }

    // Recipient email
    $to = "madhkunchala@gmail.com"; // Replace with your email
    $subject = "New Insurance Quote Request from " . $fullName;

    // Email content
    $message = "
    <html>
    <head><title>Insurance Quote Request</title></head>
    <body>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Company Name:</strong> $companyName</p>
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Coverage Selected:</strong> $coverage</p>
    </body>
    </html>";

    // Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: info@smartsolutionsdigi.com\r\n"; // Replace with your "From" email address
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>