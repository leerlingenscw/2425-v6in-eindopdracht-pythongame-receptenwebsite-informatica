<?php
session_start();
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['username'];
    $email = $POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['succes'] = "Registration succesful";
        header("Location: index.php");
        exit();
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
