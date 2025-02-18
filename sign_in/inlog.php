<?php
session_start();

$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/inlogscherm.db';
$db = new SQLite3($db_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = $db->prepare("SELECT id, username, password FROM users WHERE username = :username AND email = :email");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        header("Location: inlog.html?error=1");
        exit();
    } else {
        header("Location: /header.php");
        exit();
    }
}
?>