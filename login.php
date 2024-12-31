<?php
$users_db = [
    "user@example.com" => "password123"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (isset($users_db[$email]) && $users_db[$email] === $password) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }
}
?>
