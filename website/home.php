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

<body>
    <div class="wrapper">
        <header>
            <h1>Smulweb</h1>
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
            <section class="home">
                <div class="home-content">
                    <h2 class="home-title">
                        Inspirende recepten voor elke trek
                    </h2>
                    <p class="home-text">
                        Op deze website staan verschillende recepten voor elke gelegenheid. <br>
						Bij overzicht recepten staan alle recepten overzichtelijk weergegeven. <br>
                        Bij zoeken kunt u uw ideale recept vinden<br>
                        Ook kunt u een eigen recept toevoegen<br>
						Veel kookplezier!
                    </p>
                </div>

                
                <div class="home-image">
                    <img src="hero-dish.png" alt="Een smakelijk gerecht">
                </div>
            </section>
        </main>

        <footer> 
            © 2025| Gemaakt door Marenze Schouten, Irene Pool en Sanne Kneppers
        </footer>
    </div>
	<script src="home.js"></script> 
</body>
</html>
