<?php
$mysqli = new mysqli('localhost', 'lakshman', 'Pa$$w0rd', 'project2');
if ($mysqli->connect_errno) {
    printf("DATABASE CONNECTION FAILED: %s\n", $mysqli->connect_error);
    return FALSE;
}

function add_user($name ,$username, $password, $email) {
    global $mysqli;
    $prepared_sql = "INSERT INTO users (name ,username, password, email) VALUES (? ,?, ?, ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $name, $username, $password, $email);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function validate_login_mysql($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function alter_password($username, $password) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $hashed_password, $username);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function fetch_user_info($username) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function amend_profile($username, $name, $additionalEmail, $phone) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET name = ?, additional_email = ?, phone = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $name, $additionalEmail, $phone, $username);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

?>
