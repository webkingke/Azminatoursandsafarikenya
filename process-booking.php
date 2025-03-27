<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $package = trim($_POST['package']);
    $date = trim($_POST['date']);
    $message = trim($_POST['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($package) || empty($date)) {
        echo "<p style='color: red;'>All fields are required.</p>";
        exit;
    }
    
    // Email details
    $admin_email = "azminatoursandsafarikenya@gmail.com"; // Replace with your email
    $subject = "New Booking Request from $name";
    $body = "
        Name: $name
        Email: $email
        Phone: $phone
        Package: $package
        Travel Date: $date
        Message: $message
    ";
    
    $headers = "From: $email";
    
    if (mail($admin_email, $subject, $body, $headers)) {
        echo "<p style='color: green;'>Booking request sent successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error sending booking request. Try again.</p>";
    }

    // Optional: Store booking in the database
    /*
    $conn = new mysqli("localhost", "username", "password", "database_name");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, package, date, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $package, $date, $message);
    if ($stmt->execute()) {
        echo "Booking saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    */
}
?>
