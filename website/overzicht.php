<?php
session_start();
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: /sign_in/inlog.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0">
    <title>Smulweb</title>
    <link href="overzicht.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Overzicht recepten</h1>
        </header>

        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="overzicht.php">Overzicht recepten</a></li>
                    <li><a href="zoeken.php">Zoeken</a></li>
                    <li><a href="uploaden.php">Recepten uploaden</a></li>
                    <li><a href="wedstrijd.php">Wedstrijd</a></li>
                    <li><a href="/sign_in/uitlog.php">Uitloggen</a></li>
                </ul>
            </nav>
        </div>

        <main>
            <section id="recepten-container">
                <?php include 'overzicht2.php'; ?>
            </section>
        </main>

        <footer> 
            © 2025| Gemaakt door Marenze Schouten, Irene Pool en Sanne Kneppers
        </footer>
    </div>
	<script src="overzicht.js"></script> 
</body>
</html>