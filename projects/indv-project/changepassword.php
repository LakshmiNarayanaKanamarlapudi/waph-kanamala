<?php
require "session_auth.php";
require "database.php";

function verify_csrf_token($token) {
    return isset($token) && hash_equals($_SESSION['csrf_token'], $token);
}

$token = $_POST['csrf_token'];
if (!verify_csrf_token($token)) {
    echo "CSRF ATTACK is detected ";
    die();
}

$username = $_SESSION['username'];
$new_password = $_REQUEST["newpassword"];

if (strlen($new_password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit;
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $new_password)) {
    echo "New password does not meet the requirements.";
    exit;
}

if (isset($username) && isset($new_password)) {
    if (change_password($username, $new_password)) {
        echo "Password has been changed successfully! <a href='form.php'>Click here to login</a>";
    } else {
        echo "Change Password Failed!";
    }
} else {
    echo "No username/password provided!";
}
?>
