<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $full_name = htmlspecialchars(strip_tags(trim($_POST['full_name'])));
    $company_name = htmlspecialchars(strip_tags(trim($_POST['company_name'])));
    $contact = htmlspecialchars(strip_tags(trim($_POST['contact'])));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $coverage = isset($_POST['coverage']) ? implode(", ", $_POST['coverage']) : "None Selected";

    // Validate required fields
    if (empty($full_name) || empty($company_name) || empty($contact) || empty($email)) {
        die("All required fields must be filled.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Database Connection (Optional)
    $conn = new mysqli("localhost", "root", "", "your_database_name");

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO quote_requests (full_name, company_name, contact, email, coverage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $company_name, $contact, $email, $coverage);

    if ($stmt->execute()) {
        echo "Quote request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Send Email Notification (Optional)
    $to = "your_email@example.com";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $mailBody = "Full Name: $full_name\nCompany Name: $company_name\nContact: $contact\nEmail: $email\n\nCoverage Selected:\n$coverage";

    mail($to, "New Quote Request", $mailBody, $headers);

    // Redirect to a thank you page
    header("Location: thank_you.html");
    exit;
} else {
    die("Invalid request.");
}
?>
