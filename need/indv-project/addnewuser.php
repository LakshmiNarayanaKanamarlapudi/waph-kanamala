<?php
// Function to sanitize input data
function sanitize_input($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Remove backslashes (\)
    $input = stripslashes($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}

// Include database connection file
require_once 'database.php';

// Check if form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data from the form
    $name = sanitize_input($_POST["name"]);
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);
    $confirm_password = sanitize_input($_POST["confirm_password"]);

    // Check if any field is empty
    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        // Display error message if any field is empty
        echo "All fields are required.";
        exit;
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        // Display error message if passwords do not match
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password using bcrypt algorithm
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Call function to add new user to the database
    if (add_new_user($name, $username, $hashed_password, $email)) {
        // Display success message if user is registered successfully
        echo "User registered successfully.";
        // Redirect to login page after successful registration
        header("Location: form.php");
        exit;
    } else {
        // Display error message if user registration fails
        echo "Error registering user.";
    }
}
?>
