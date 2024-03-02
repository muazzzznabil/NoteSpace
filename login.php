<?php


$username = $_GET['username'];
$password = $_GET['password'];

$conn = new mysqli('localhost', 'root', '', 'users');

if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $username = $conn->real_escape_string($username); // Sanitize input to prevent SQL injection
    $password = $conn->real_escape_string($password); // Sanitize input to prevent SQL injection

    $stmt = "SELECT username, password, userid FROM user_info WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($stmt);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $userid = $row['userid']; // Retrieve the userid from the query result
        session_start(); // Start the session
        $_SESSION['userid'] = $userid; // Set the userid in the session
        echo $userid;
        header('Location: mainpage.html');
        exit;
    } else {
        echo "Login Failed";
    }

    $conn->close();
}
