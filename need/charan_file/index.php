<?php
session_set_cookie_params(15*60, "/", "waph-team13.minifacebook.com", TRUE, TRUE);
session_start();
require "database.php";



// Check if login credentials are submitted
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Validate login
    if (checklogin_mysql($_POST["username"], $_POST["password"])) {
        $_SESSION["authenticated"] = TRUE;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["browser"] = $_SERVER['HTTP_USER_AGENT'];
    } else {
        // Invalid credentials
        session_destroy();
        echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
        die();
    }
}

// Check if user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true){
    session_destroy();
    echo "<script>alert('You have not logged in. Please log in first');</script>";
    header("Refresh:0; url=form.php");
    die();
}
  
// Check for session hijacking
if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]){
    session_destroy();
    echo "<script>alert('Session hijacking is detected!');</script>";
    header("Refresh:0; url=form.php");
    die();
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <form action="index.php" method="POST" class="form login">
        <h1>Home Page</h1>
        <h2> Welcome <?php echo htmlentities($_POST['username']); ?> !</h2>
        <a style= "color:black;" href="changepasswordform.php" class="link">Change my password</a> 
        <a style= "color:black;" href="profile.php" class="link">Edit my  profile</a> 
        <a style= "color:black;" href="logout.php" class="link">Logout</a>
        </form>
    </div>
</body>
</html>
