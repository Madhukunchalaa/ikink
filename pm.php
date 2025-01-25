<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['full-name']);
    $address = htmlspecialchars($_POST['address']);
    $companyName = htmlspecialchars($_POST['company-name']);
    $contactNumber = htmlspecialchars($_POST['contact-number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $businessDescription = htmlspecialchars($_POST['business-description']);
    $professionalIndemnity = htmlspecialchars($_POST['professional-indemnity']);
    $publicLiability = htmlspecialchars($_POST['public-liability']);


   

    // Check if email is valid
    if (!$email) {
        echo "Invalid email address.";
        exit();
    }
    $insurancePolicy = isset($_FILES['insurance-policy']) && $_FILES['insurance-policy']['error'] == UPLOAD_ERR_OK ? $_FILES['insurance-policy']['name'] : 'No File Uploaded';


    // Recipient email
    $to = "madhkunchala@gmail.com";
    $subject = "New Insurance Quote Request from " . $fullName;

     // Email content
    $message = "
    <html>
    <head><title>Insurance Quote Request</title></head>
    <body>
        <p><strong>Full Name:</strong> $fullName</p>
          <p><strong>Full address:</strong> $address</p>
        <p><strong>Company Name:</strong> $companyName</p>
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Email:</strong> $email</p>
            <p><strong>Business Description:</strong> $businessDescription</p>
          <p><strong>Professional Indemnity :</strong> $professionalIndemnity </p>
             <p><strong>Public Liability :</strong> $publicLiability</p>
        <p><strong>Insurance Policy:</strong> $insurancePolicy</p>
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