<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Collect and sanitize form data
    $fullName = htmlspecialchars($_POST['full-name']);
    $address = htmlspecialchars($_POST['address']);
    $contactNumber = htmlspecialchars($_POST['contact-number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
    $companyName = htmlspecialchars($_POST['company-name']);
     $occupation = htmlspecialchars($_POST['occupation']);

     $renewalMonth = htmlspecialchars($_POST['renewal-month']);
    $renewalDay = htmlspecialchars($_POST['renewal-day']);
   $renewalYear = htmlspecialchars($_POST['renewal-year']);

    $vehicleType = htmlspecialchars($_POST['vehicle-type']);
     $carryingCapacity = htmlspecialchars($_POST['carrying-capacity']);
    $trailerCoverRequired = htmlspecialchars($_POST['trailer-cover-required']);
    $truckDetails = htmlspecialchars($_POST['truck-details']);
       $baseOperation = htmlspecialchars($_POST['base-operation']);
     $publicLiabilityCover = htmlspecialchars($_POST['public-liability-cover']);
     $sumInsured = htmlspecialchars($_POST['sum-insured']);
   $radiusOperation = htmlspecialchars($_POST['radius-operation']);
    $marineCover = htmlspecialchars($_POST['marine-cover']);
    $registrationNumber = htmlspecialchars($_POST['registration-number']);
    $typeGoodsCarried = htmlspecialchars($_POST['type-goods-carried']);
      $requireFinance = htmlspecialchars($_POST['require-finance']);

    $businessEstablished = htmlspecialchars($_POST['business-established']);
  $currentInsurer = htmlspecialchars($_POST['current-insurer']);
  $driverAge = htmlspecialchars($_POST['driver-age']);
  $yearContinuouslyInsured = htmlspecialchars($_POST['year-continuously-insured']);
  $numberTruckInsurance = htmlspecialchars($_POST['number-truck-insurance']);
   $yearTruckLicenceHeld = htmlspecialchars($_POST['year-truck-licence-held']);
   $drivingConvictions = htmlspecialchars($_POST['driving-convictions']);


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
        <p><strong>Address:</strong> $address</p>
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Email:</strong> $email</p>
          <p><strong>Company Name:</strong> $companyName</p>
           <p><strong>Occupation:</strong> $occupation</p>

          <p><strong>Renewal Date:</strong> $renewalMonth/$renewalDay/$renewalYear </p>


        <p><strong>Vehicle Type:</strong> $vehicleType</p>
        <p><strong>Carrying Capacity:</strong> $carryingCapacity</p>
         <p><strong>Trailer Cover Required:</strong> $trailerCoverRequired</p>
          <p><strong>Truck Details:</strong> $truckDetails</p>
        <p><strong>Base Operation:</strong> $baseOperation</p>
           <p><strong>Public Liability Cover:</strong> $publicLiabilityCover</p>
           <p><strong>Sum Insured:</strong> $sumInsured </p>
           <p><strong>Radius of Operation:</strong> $radiusOperation </p>
           <p><strong>Marine Cover:</strong> $marineCover</p>
           <p><strong>Registration Number:</strong> $registrationNumber</p>
        <p><strong>Type Of Goods Carried:</strong> $typeGoodsCarried</p>
          <p><strong>Require Finance:</strong> $requireFinance</p>

       <p><strong>Number of year's business established:</strong> $businessEstablished </p>
         <p><strong>Name of Current Insurer:</strong> $currentInsurer </p>
         <p><strong>Age of Regular Driver:</strong> $driverAge</p>
        <p><strong>Number Of Years Continuously Insured:</strong> $yearContinuouslyInsured</p>
          <p><strong>Number Of Truck Claims:</strong> $numberTruckInsurance</p>
             <p><strong>Number of Year Relevant Truck License:</strong> $yearTruckLicenceHeld</p>
           <p><strong>Driving Convictions:</strong> $drivingConvictions </p>
    </body>
    </html>";
     
    
    // Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: info@smartsolutionsdigi.com\r\n"; // Replace with your "From" email
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