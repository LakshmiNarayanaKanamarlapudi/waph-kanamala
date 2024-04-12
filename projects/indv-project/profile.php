<?php
session_start();

// Check if user is valid
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

// Get necessary files
require "database.php";

// Retrive user's current profile information
$username = $_SESSION['username'];
$userInfo = fetch_user_info($username);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //The data will be  Retrived 
    $name = isset($_POST["name"]) ? $_POST["name"] : $userInfo['name'];
    $additionalEmail = isset($_POST["additional_email"]) ? $_POST["additional_email"] : $userInfo['additional_email'];
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : $userInfo['phone'];

    
    if (amend_profile($username, $name, $additionalEmail, $phone)) {
        echo "<script>alert('Profile updated successfully');</script>";
        // Refresh the page
        $userInfo = fetch_user_info($username); // Fetch updated user information
    } else {
        echo "<script>alert('Failed to update profile');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        /* Your CSS styles here */
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
    <h1>Edit Profile</h1>
    <h2>Hello, <?php echo htmlentities($_SESSION['username']); ?></h2>
    <div id="digit-clock"></div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($userInfo['name']) ? $userInfo['name'] : ''; ?>"><br>

        <label for="additional_email">Additional Email:</label><br>
        <input type="email" id="additional_email" name="additional_email" value="<?php echo isset($userInfo['additional_email']) ? $userInfo['additional_email'] : ''; ?>"><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo isset($userInfo['phone']) ? $userInfo['phone'] : ''; ?>"><br><br>

        <button type="submit">Update Profile</button>
    </form>

    
    <a href="change_password_form.php">Change password</a> | <a href="logout.php">Logout</a>
</div>
</body>
</html>
