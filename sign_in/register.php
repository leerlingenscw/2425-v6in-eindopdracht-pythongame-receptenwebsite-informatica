<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationdb";  // De naam van je database

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registratie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Verkrijg de formuliergegevens voor registratie
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Wachtwoord hashen

    // Prepared statement om de gebruiker toe te voegen
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful!";
        header("Location: index.php"); // Je kunt dit aanpassen naar je gewenste redirect
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Inloggen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Verkrijg de formuliergegevens voor inloggen
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement om te controleren of de gebruiker bestaat
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        // Vergelijk het ingevoerde wachtwoord met het gehashte wachtwoord in de database
        if (password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data['username'];
            echo "<h2>Login successful!</h2>";
            // Redirect naar de homepagina of dashboard
            header("Location: home.php"); // Je kunt dit aanpassen naar je gewenste redirect
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
