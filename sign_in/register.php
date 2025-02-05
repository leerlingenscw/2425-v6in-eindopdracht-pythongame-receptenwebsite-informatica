<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationdb";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful!";
        header("Location: login.html"); 
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
