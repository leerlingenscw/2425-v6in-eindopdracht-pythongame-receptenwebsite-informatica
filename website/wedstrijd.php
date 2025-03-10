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
    <link href="wedstrijd.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Wedstrijd</h1>
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
        <section class="wedstrijd">
            <form action="wedstrijd2.php" method="post" id="registerForm" novalidate > 
                <h2>Recepten wedstrijd</h2>        
                
                <div class="form-group">
                    <label for="gerecht">Recept:</label>
                    <input type="text" id="gerecht" name="gerecht" required>
                </div>

            <div class ="wedstrijdregelementen">
                <label><input type="checkbox"> Ik ga akkoord met de <a href = "wedstrijdregelementen.html">wedstrijdregelementen</a></label>
            </div>
            
            <div class ="wedstrijd-uploaden">
                <button type="submit" class="btn">Uploaden</button>
            </div>

        </form>
        </section>


        <main>
            <section class="uploaden">
                <div class="uploaden-content">
                    <p class="home-text">
                        Wij willen de bezoekers van onze website een kans geven 
                        om ook iets toe te voegen. Daarom hebben wij een recepten
                        wedstrijd bedacht. 
                        Bezoekers van onze website kunnen recepten insturen, hier 
                        kunnen wij naar kijken en over een maand kan je onze 
                        favorieten terugvinden op de website. En dat niet alleen, de winnaar krijgt ook een kookboek cadeau!
                    </p>
                    <p class="home-text">
                        Doe vooral mee en wees lekker creatief.
                        Veel succes!
                    </p>
                </div>
            </section>
        </main>
   
        </main>

        <footer> 
            © 2025| Gemaakt door Marenze Schouten, Irene Pool en Sanne Kneppers
        </footer>
    </div>

</body>
</html>