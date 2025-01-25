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
   
    $numberOfTrucks = htmlspecialchars($_POST['number-of-trucks']);
    $baseOperationPostcode = htmlspecialchars($_POST['base-operation-postcode']);
      $trailerCoverRequired = htmlspecialchars($_POST['trailer-cover-required']);
      
    $vehicleType = htmlspecialchars($_POST['vehicle-type']);
    $radiusOperation = htmlspecialchars($_POST['radius-operation']);
     $publicLiabilityCover = htmlspecialchars($_POST['public-liability-cover']);
         $trailerCoverRequired2 = htmlspecialchars($_POST['trailer-cover-required2']);

       $typeGoodsCarried = htmlspecialchars($_POST['type-goods-carried']);
    $marineCover = htmlspecialchars($_POST['marine-cover']);
       
    $yearsBusinessEstablished = htmlspecialchars($_POST['years-business-established']);
    $currentInsurer = htmlspecialchars($_POST['current-insurer']);
       $yearsContinuouslyInsured = htmlspecialchars($_POST['years-continuously-insured']);
       $truckInsuranceClaims = htmlspecialchars($_POST['truck-insurance-claims']);
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
            <p><strong>Number Of Trucks:</strong> $numberOfTrucks</p>
          <p><strong>Base Operation Postcode:</strong> $baseOperationPostcode</p>
           <p><strong>Trailer Cover Required :</strong> $trailerCoverRequired</p>

        <p><strong>Vehicle Type:</strong> $vehicleType</p>
           <p><strong>Radius Operation:</strong> $radiusOperation</p>
           <p><strong>Public Liability Cover:</strong> $publicLiabilityCover </p>
              <p><strong>Trailer Cover Required (duplicate field) :</strong> $trailerCoverRequired2</p>
        <p><strong>Type Of Goods Carried:</strong> $typeGoodsCarried</p>
           <p><strong>Marine Cover:</strong> $marineCover </p>

     
        <p><strong>Years of Business Established:</strong> $yearsBusinessEstablished </p>
           <p><strong>Name of Current Insurer:</strong> $currentInsurer</p>
        <p><strong>Years Continuously Insured:</strong> $yearsContinuouslyInsured </p>
           <p><strong>Truck Insurance Claims in the last 5 Years:</strong> $truckInsuranceClaims</p>
              <p><strong>Driving Convictions :</strong> $drivingConvictions</p>
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