<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['full-name']);
    $address = htmlspecialchars($_POST['address']);
    $contactNumber = htmlspecialchars($_POST['contact-number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $occupation = htmlspecialchars($_POST['occupation']);
    $billingNumber = htmlspecialchars($_POST['billing-number']);
    $plateNumber = htmlspecialchars($_POST['plate-number']);
    $vinNumber = htmlspecialchars($_POST['vin-number']);
    $customerNumber = htmlspecialchars($_POST['customer-number']);
    $vehicleStatus = htmlspecialchars($_POST['vehicle-status']);
    $yearManufacture = htmlspecialchars($_POST['year-manufacture']);
    $makeVehicle = htmlspecialchars($_POST['make-vehicle']);
    $vehicleShape = htmlspecialchars($_POST['vehicle-shape']);
    $vehicleGVM = htmlspecialchars($_POST['vehicle-gvm']);
    $vehicleUsage = htmlspecialchars($_POST['vehicle-usage']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $suburb = htmlspecialchars($_POST['suburb']);
    $customerType = htmlspecialchars($_POST['customer-type']);
    $insuranceDuration = htmlspecialchars($_POST['insurance-duration']);
    $inputTaxCredit = htmlspecialchars($_POST['input-tax-credit']);



    // Check if email is valid
    if (!$email) {
        echo "Invalid email address.";
        exit();
    }

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
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Email:</strong> $email</p>
         <p><strong>occupation:</strong> $occupation</p>
         <p><strong>billingNumber:</strong> $billingNumber</p>
         <p><strong>plateNumber:</strong> $plateNumber</p>
         <p><strong>vinNumber:</strong> $vinNumber</p>
         <p><strong>customerNumber:</strong> $customerNumber</p>
         <p><strong>vehicleStatus:</strong> $vehicleStatus</p>
         <p><strong>yearManufacture:</strong> $yearManufacture</p>
         <p><strong>makeVehicle:</strong> $makeVehicle</p>
         <p><strong>vehicleShape:</strong> $vehicleShape</p>
         <p><strong>vehicleGVM:</strong> $vehicleGVM</p>
        <p><strong>vehicleUsage:</strong> $vehicleUsage</p>
        <p><strong>postcode:</strong> $postcode</p>
        <p><strong>suburb:</strong> $suburb</p>
        <p><strong>customerType:</strong> $customerType</p>
         <p><strong>insuranceDuration:</strong> $insuranceDuration</p>
           <p><strong>inputTaxCredit:</strong> $inputTaxCredit</p>
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