<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $address = htmlspecialchars($_POST['address']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $occupation = htmlspecialchars($_POST['occupation']);
    $selfEmployed = htmlspecialchars($_POST['selfEmployed']);
    $experience = htmlspecialchars($_POST['experience']);
    $coverageType = htmlspecialchars($_POST['coverageType']);
    $accidentBenefit = htmlspecialchars($_POST['accidentBenefit']);
    $sicknessBenefit = htmlspecialchars($_POST['sicknessBenefit']);
    $benefitPeriod = htmlspecialchars($_POST['benefitPeriod']);
    $capitalBenefit = htmlspecialchars($_POST['capitalBenefit']);
    $waitingPeriod = htmlspecialchars($_POST['waitingPeriod']);

    if (!$email) {
        echo "Invalid email address.";
        exit();
    }

    // Recipient email
    $to = "madhkunchala@gmail.com";
    $subject = "New Insurance Inquiry from " . $fullName;

    // Email content
    $message = "
    <html>
    <head><title>Insurance Inquiry</title></head>
    <body>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Contact:</strong> $contact</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Occupation:</strong> $occupation</p>
        <p><strong>Self Employed:</strong> $selfEmployed</p>
        <p><strong>Experience:</strong> $experience</p>
        <p><strong>Coverage Type:</strong> $coverageType</p>
        <p><strong>Accident Benefit:</strong> $accidentBenefit</p>
        <p><strong>Sickness Benefit:</strong> $sicknessBenefit</p>
        <p><strong>Benefit Period:</strong> $benefitPeriod</p>
        <p><strong>Capital Benefit:</strong> $capitalBenefit</p>
        <p><strong>Waiting Period:</strong> $waitingPeriod</p>
    </body>
    </html>";

    // Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: info@smartsolutionsdigi.com\r\n";
    $headers .= "Reply-To: $email\r\n";

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
