<?php
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (isset($username) && isset($password) && isset($fullname) && isset($email) && isset($phone)){
        if (addnewuser( $username, $password, $fullname, $email, $phone)) {
            echo "Registration Succeed!";
        } else {
            echo "Registration Failed";    
        }
    } else {
        echo "Required fields are missing!";
    }

    function addnewuser( $username, $password, $fullname, $email, $phone) {
        $mysqli = new mysqli('localhost', 'lakshman', 'Pa$$w0rd', 'project2');
        if ($mysqli->connect_errno){
            printf("Database connection failed: %s\n", $mysqli->connect_error);
            return FALSE;
        }
        $hashed_password = md5($password); // Hashing the password
        $prepared_sql = "INSERT INTO users ( Username, Password, Fullname, Email, Phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("sssss",  $username, $hashed_password, $fullname, $email, $phone);
        if ($stmt->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
?>
<a href="form.php">Login</a>