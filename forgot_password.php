<?php
$users_db = [
    "user@example.com" => ["password" => "password123", "reset_token" => ""]  // Example user
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    if (isset($users_db[$email])) {
        $token = bin2hex(random_bytes(16));
        $users_db[$email]["reset_token"] = $token;
        $reset_link = "http://localhost/reset_password.php?token=$token"; // Change localhost as needed
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: no-reply@example.com";
        if (mail($email, $subject, $message, $headers)) {
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Error sending reset link.";
        }
    } else {
        echo "Email not found.";
    }
}
?>
