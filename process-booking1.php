<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = filter_var($_POST['email_id'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone-number']);
    $date = htmlspecialchars($_POST['date']);
    $safari_type = htmlspecialchars($_POST['safari-type']);
    $safari_places = htmlspecialchars($_POST['safari-places']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email details
    $to = "Kassimsharif82@gmail.com";
    $subject = "New Tour Enquiry";
    $body = "Full Name: $full_name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Date: $date\n";
    $body .= "Safari Type: $safari_type\n";
    $body .= "Safari Destination: $safari_places\n";
    $body .= "Message: $message\n";

    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Enquiry submitted successfully!'); window.location.href='thank-you.html';</script>";
    } else {
        echo "<script>alert('Failed to send enquiry. Try again later.'); window.location.href='booking-form.html';</script>";
    }
} else {
    header("Location: index.html");
    exit();
}
