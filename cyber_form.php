<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['full-name']);
    $companyName = htmlspecialchars($_POST['company-name']);
    $contactNumber = htmlspecialchars($_POST['contact-no']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $occupation = htmlspecialchars($_POST['occupation']);
    $turnover = htmlspecialchars($_POST['turnover']);
    $employees = htmlspecialchars($_POST['employees']);



    // Check if email is valid
    if (!$email) {
        echo "Invalid email address.";
        exit();
    }

    // Recipient email
    $to = "madhkunchala@gmail.com";
    $subject = "New Cyber Insurance Quote Request from " . $fullName;

    // Email content
    $message = "
    <html>
    <head><title>Cyber Insurance Quote Request</title></head>
    <body>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Company Name:</strong> $companyName</p>
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Occupation:</strong> $occupation</p>
          <p><strong>Turnover:</strong> $turnover</p>
        <p><strong>Number of employees:</strong> $employees</p>
    </body>
    </html>";

    // Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: info@smartsolutionsdigi.com\r\n";
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