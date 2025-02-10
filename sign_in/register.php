<?php
$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/inlogscherm.db';
$db = new SQLite3($db_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $db->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if ($row['count'] > 0) {
        die("❌ Dit e-mailadres is al geregistreerd. Kies een ander e-mailadres.");
    }

    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);

    if ($stmt->execute()) {
        header("Location: /sign_in/inlog.html");
    }
}
?>