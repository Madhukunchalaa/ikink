<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
     $fullName = htmlspecialchars($_POST['full-name']);
    $companyName = htmlspecialchars($_POST['company-name']);
    $contactNumber = htmlspecialchars($_POST['contact-number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $businessAddress = htmlspecialchars($_POST['business-address']);
     $businessDescription = htmlspecialchars($_POST['business-description']);
       $numberOfDirectorsEmployees = htmlspecialchars($_POST['number-of-directors-employees']);
       $estimatedAnnualTurnover = htmlspecialchars($_POST['estimated-annual-turnover']);
       $paymentsToSubcontractors = htmlspecialchars($_POST['payments-to-subcontractors']);
          $howDidYouFindUs = htmlspecialchars($_POST['how-did-you-find-us']);



    // Collect checkbox values (coverage)
        $coverage = isset($_POST['coverage']) ? implode(", ", $_POST['coverage']) : 'None';

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
        <p><strong>Company Name:</strong> $companyName</p>
         <p><strong>Contact Number:</strong> $contactNumber</p>
           <p><strong>Email:</strong> $email</p>
             <p><strong>Business Address:</strong> $businessAddress</p>
            <p><strong>Business Description:</strong> $businessDescription</p>
             <p><strong>Number Of Directors and Employees:</strong> $numberOfDirectorsEmployees</p>
           <p><strong>Estimated Annual Turnover:</strong> $estimatedAnnualTurnover</p>
              <p><strong>Payments To Subcontractors:</strong> $paymentsToSubcontractors</p>
             <p><strong>Coverage Required:</strong> $coverage</p>
             <p><strong>How did you find us?:</strong> $howDidYouFindUs</p>
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