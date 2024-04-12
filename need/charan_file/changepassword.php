
<?php
require "session_auth.php";
require "database.php";

// CSRF attack validation 
function validate_csrf_token($token) {
    return isset($token) && hash_equals($_SESSION['nocsrftoken'], $token);
}

// Validate CSRF token
$token = $_POST['nocsrftoken'];
if (!validate_csrf_token($token)) {
    echo "<div style='color: red; text-align: center; font-size: 24px;'>CSRF ATTACK IS DETECTED</div>";
    die();
}

$username = $_SESSION['username'];
$new_password = $_REQUEST["newpassword"];

// Server-side validation for password criteria
if (strlen($new_password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit;
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $new_password)) {
    echo "New password does not meet the requirements.";
    exit;
}

// Validate username and new password
if (isset($username) && isset($new_password)) {
    if (changepassword($username, $new_password)) {
        echo"Password changed successfully";
        echo "<br>";
        echo "<a href='form.php'>Login</a>";
    } else {
        echo "Change Password Failed!";
    }
} else {
    echo "No username/password provided!";
}
?>
