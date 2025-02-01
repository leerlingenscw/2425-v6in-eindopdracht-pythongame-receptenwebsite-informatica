<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /inlogscherm/inlog.html");
    exit();
}
?>

<?php require_once("header.php"); ?>
<h1>Welcome to my Database App!</h1>
</body>
</html>
