<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationdb";  // 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        
        if (password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data['username'];
            echo "<h2>Login successful!</h2>";
            
            header("Location: home.php"); 
            exit();
        } else {
            echo "<h2>Invalid Email or Password</h2>";
        }
    } else {
        echo "<h2>No user found with this email</h2>";
    }
}

$conn->close();
?>
