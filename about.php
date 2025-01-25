<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $userEmail = filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL) ? $_POST['userEmail'] : null;
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $userCity = htmlspecialchars($_POST['userCity']);
    $serviceType = htmlspecialchars($_POST['serviceType']);
    $userMessage = htmlspecialchars($_POST['userMessage']);

    if (!$userEmail) {
        echo "Invalid email address.";
        exit();
    }

    // Recipient email
    $to = "madhkunchala@gmail.com";
    $subject = "New Insurance Inquiry from " . $fullName;

    // Email content
    $message = "
    <html>
    <head>
      <title>Insurance Inquiry</title>
    </head>
    <body>
      <p><strong>Full Name:</strong> $fullName</p>
      <p><strong>Email:</strong> $userEmail</p>
      <p><strong>Phone Number:</strong> $phoneNumber</p>
      <p><strong>City:</strong> $userCity</p>
      <p><strong>Selected Insurance:</strong> $serviceType</p>
      <p><strong>Message:</strong><br>$userMessage</p>
    </body>
    </html>
    ";

    // Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: info@smartsolutionsdigi.com\r\n";
    $headers .= "Reply-To: $userEmail\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>
