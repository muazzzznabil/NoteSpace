<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: indexFacebook.html");
}

$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userid = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT user_post FROM user_data where userid ='$userid'"); // Enclose $user_id in single quotes
// $result = $conn->query($query);

// Codeium Way (Complicated)
// if ($result) {
//     while ($row = $result->fetch_assoc()) {
//         echo "
//         <style> 
//         .content {
//             box-shadow: -10px 10px 10px #c7cede;
//         }
//         </style>
//         <li class='content' style='list-style-type: none; padding: 10px; color: rgba(251, 251, 252, 0.873); font-size: 1.2rem; font-family: Helvetica;'>"
//             . $row['user_post'] . "</li>";
//     }
// } else {
//     echo "Error: " . $conn->error;
// }

while ($r = mysqli_fetch_array($query)) {
    echo "
        <style> 
        .content {
            box-shadow: -10px 10px 10px #c7cede;
        }

        .right {
            float: right;
            padding: 0 20px 0 0;           
        }

        .editButton {
            border: none;
            background-color: #7c96d4;
            color: rgba(251, 251, 252, 0.873);
         
        }

        </style>
        <li class='content' style='list-style-type: none; padding: 10px; color: rgba(251, 251, 252, 0.873); font-size: 1.2rem; font-family: Helvetica;'>"
        . $r['user_post'] . "<span class = 'right'><button class = 'editButton' name = 'edit'>Edit</button> | <button class = 'editButton' name = 'delete'>Delete</button></button></span> </li>";
}



// Close the database connection
$conn->close();
