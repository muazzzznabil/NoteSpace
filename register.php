<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {

    $stmt = $conn->prepare("INSERT INTO user_info (firstname, lastname, username, email, password)
    VALUES (?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $password);
    $stmt->execute();
    echo "Registration Successful";
    $stmt->close();
    $conn->close();
}