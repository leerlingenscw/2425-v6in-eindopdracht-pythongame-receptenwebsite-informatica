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
    <meta name="viewport" content="width=device-width">
    <title>Smulweb</title>
    <link href="home.css" rel="stylesheet" type="text/css">
</head>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Smulweb</title>
    <link href="uploaden.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Recepten Uploaden</h1>
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
            <h2>Nieuw Recept Toevoegen</h2>
           

<form action="uploaden2.php" method="post">
    <label for="gerecht">Naam van het gerecht:</label>
    <input type="text" id="gerecht" name="gerecht" required><br>

    <label for="ingredienten">Ingrediënten (1 per regel: ingredient - hoeveelheid):</label>
    <textarea id="ingredienten" name="ingredienten" rows="5" required></textarea><br>

    <label for="bereidingswijze">Bereidingswijze:</label>
    <textarea id="bereidingswijze" name="bereidingswijze" rows="5" required></textarea><br>

    <input type="submit" value="Recept toevoegen">
</form>
        </main>

        <footer> 
            © 2025| Gemaakt door Marenze Schouten, Irene Pool en Sanne Kneppers
        </footer>
    </div>
	<script src="home.js"></script> 
	<script src="overzicht.js"></script> 
</body>
</html>