<?php
session_start();

$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/inlogscherm.db';
$db = new SQLite3($db_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "❌ Vul alle velden in.";
        exit();
    }

    $stmt = $db->prepare("SELECT id, username, password FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /header.php");
        exit();
    } else {
        echo "❌ Ongeldige inloggegevens. Probeer opnieuw.";
    }
}
?>