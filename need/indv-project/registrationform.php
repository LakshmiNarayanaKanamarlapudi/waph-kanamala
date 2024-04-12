<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>Mini Facebook</title>
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" type="text/css" href="form_styles.css">
</head>
<body>
    <!-- Container to hold the registration form -->
    <div class="container">
        <!-- Heading for the registration form -->
        <h1>Registration Form</h1>
        <!-- Registration form with input fields -->
        <form action="addnewuser.php" method="POST">
            <!-- Input field for name -->
            <input type="text" class="text_field" name="name" placeholder="name" required pattern="\w+" title="Please enter a valid name">
            <!-- Input field for username -->
            <input type="text" class="text_field" name="username" placeholder="Username" required pattern="\w+" title="Please enter a valid username">
            <!-- Input field for email -->
            <input type="email" class="text_field" name="email" placeholder="Your email address" required pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$" title="Please enter a valid email">
            <!-- Input field for password -->
            <input type="password" class="text_field" name="password" placeholder="Password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$" title="Password must have at least 8 characters with at least one lowercase, one uppercase, one number, and one special character">
            <!-- Input field to confirm password -->
            <input type="password" class="text_field" name="confirm_password" placeholder="Confirm Password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$" title="Password must match">
            <!-- Button to submit the form -->
            <button type="submit" class="button">Register</button>
        </form>
    </div>
</body>
</html>
