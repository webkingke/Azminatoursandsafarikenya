<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email_id'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "azminatoursandsafarikenya@gmail.com";
        $subject = "New Newsletter Signup";
        $message = "You have a new subscriber: " . $email;
        $headers = "From: azminatoursandsafarikenya@gmail.com" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8";
        
        if (mail($to, $subject, $message, $headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "invalid_email";
    }
} else {
    echo "invalid_request";
}
?>
