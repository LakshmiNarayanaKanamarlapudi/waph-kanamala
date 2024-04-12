<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

// Include necessary files
require "database.php";

// Fetch user's current profile information
$username = $_SESSION['username'];
$userInfo = getUserInfo($username);

// If form is submitted for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $name = isset($_POST["name"]) ? $_POST["name"] : $userInfo['name'];
    $additional_email = isset($_POST["additional_email"]) ? $_POST["additional_email"] : $userInfo['additional_email'];
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : $userInfo['phone'];

    // Update user's profile information
    if (updateProfile($username, $name, $additional_email, $phone)) {
        echo "<script>alert('Profile updated successfully');</script>";
        // Refresh the page to reflect changes
        $userInfo = getUserInfo($username); // Fetch updated user information
    } else {
        echo "<script>alert('Failed to update profile');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit my Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
    <h1>Edit my profile</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo isset($userInfo['name']) ? $userInfo['name'] : ''; ?>"><br>

    <label for="additional_email">Additional Email:</label><br>
    <input type="email" id="additional_email" name="additional_email" value="<?php echo isset($userInfo['additional_email']) ? $userInfo['additional_email'] : ''; ?>"><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo isset($userInfo['phone']) ? $userInfo['phone'] : ''; ?>"><br><br>

    <button style= "color:black;" type="submit">Update my profile</button>
</form>


    
    <a style= "color:black;" href="changepasswordform.php">Change my password</a> | <a style= "color:black;" href="logout.php">Logout</a>
</div>
</body>
</html>
