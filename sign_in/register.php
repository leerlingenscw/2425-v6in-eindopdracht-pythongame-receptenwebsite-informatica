<?php
session_start();
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationdb";

// create connection
$conn = new mysqli($servername, $username, $password, $registrationdb);

// check connection
if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
} else { 
    $stmt = $conn->prepare("select * from users where email = ?");
    $stmt->bind_param("s", $email);
    $stmt_>execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>Login succesfully</h2>";
        }
   } else {
    echo"<h2>Invalid Email or password</h2>";
   }
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
