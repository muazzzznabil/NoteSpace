<?php


session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: indexFacebook.html");
}
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$note = $_POST['note'];
$userid = $_SESSION['userid'];
$insertNote = "INSERT INTO user_data (user_post, userid) VALUES ('$note', '$userid')";
$resultNote = $conn->query($insertNote);

if ($resultNote) {
    echo "alert('Note added successfully!')";
    header("location: inputPage.html");
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
