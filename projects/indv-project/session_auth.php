<?php
// Initialize session with secure parameters
session_set_cookie_params([
    'lifetime' => 15*60,
    'path' => '/',
    'domain' => 'waph-team13.minifacebook.com',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

// Function to authenticate user
function validate_user() {
    $_SESSION['authenticated'] = true;
}

// Function to log out user
function end_session() {
    session_unset();
    session_destroy();
}

// Check if session is hijacked
function check_session() {
    // Check if browser information is stored in session
    if (!isset($_SESSION['browser'])) {
        $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
    } 
    // Compare stored browser information with current browser
    elseif ($_SESSION['browser'] !== $_SERVER['HTTP_USER_AGENT']) {
        // End session if hijacking detected
        end_session();
        echo "<script>alert('Session hijacking detected!');</script>";
        header("Location: form.php");
        exit;
    }
}

// Check if user is authenticated
function is_valid_user() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

// Function to redirect to login page if not authenticated
function redirect_if_unauthenticated() {
    // Redirect if user is not authenticated
    if (!is_valid_user()) {
        end_session();
        echo "<script>alert('You are not logged in. Please log in first.');</script>";
        header("Location: form.php");
        exit;
    }
}

// Initialize session and check session hijacking
function initialize() {
    // Ensure user is authenticated and session is secure
    redirect_if_unauthenticated();
    check_session();

    // Generate CSRF token if not already present
    if (!isset($_SESSION['nocsrftoken'])) {
        $_SESSION['nocsrftoken'] = bin2hex(random_bytes(32));
    }
}
?>
