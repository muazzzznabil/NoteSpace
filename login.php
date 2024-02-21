<?php

$username = $_GET['username'];
$password = $_GET['password'];

$conn = new mysqli('localhost', 'root', '', 'users');

if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = "select username, password from user_info where username = '$username' and password = '$password'";
    $result = $conn->query($stmt);

    if ($result->num_rows == 1) {
        echo "Login Successful";
    } else {
        echo "Login Failed";
    }

    $conn->close();
}
