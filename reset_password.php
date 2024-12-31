<?php
$users_db = [
    "user@example.com" => ["password" => "password123", "reset_token" => ""] 
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $token = $_POST["token"];
    $email = null;
    foreach ($users_db as $user_email => $user_data) {
        if ($user_data["reset_token"] === $token) {
            $email = $user_email;
            break;
        }
    }
    
    if ($email) {
        $users_db[$email]["password"] = $new_password;
        $users_db[$email]["reset_token"] = ""; 
        
        echo "Your password has been reset successfully!";
    } else {
        echo "Invalid or expired token.";
    }
}
?>
