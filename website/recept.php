<?php
session_start();
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: /sign_in/inlog.html");
    exit();
}

$gerecht_id = $_GET['gerecht_id'];


$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);

if (!$db) {
    echo "Fout bij het verbinden met de database.";
    exit();
}

$query = $db->prepare("SELECT naam.gerecht AS gerecht, 
                              recept.instructies AS bereidingswijze,
                              ingrediënten.ingrediënt, 
                              ingrediënten.hoeveelheid 
                       FROM naam 
                       JOIN recept ON naam.gerecht_id = recept.gerecht_id 
                       JOIN ingrediënten ON naam.gerecht_id = ingrediënten.gerecht_id 
                       WHERE naam.gerecht_id = :gerecht_id");

$query->bindValue(':gerecht_id', $gerecht_id, SQLITE3_INTEGER);
$result = $query->execute();

$ingredienten = [];
$gerecht = '';
if ($result) {
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        
        if (empty($gerecht)) {
            $gerecht = $row['gerecht'];
        }
        
        $ingredienten[] = $row['ingrediënt'] . ' - ' . $row['hoeveelheid'];
        $bereidingswijze = $row['bereidingswijze'];
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
                        <li><a href="overzicht.html">Overzicht recepten</a></li>
                        <li><a href="zoeken.html">Zoeken</a></li>
                        <li><a href="uploaden.html">Recepten uploaden</a></li>
                        <li><a href="wedstrijd.html">Wedstrijd</a></li>
                        <li><a href="/sign_in/uitlog.php">Uitloggen</a></li>
                    </ul>
                </nav>
            </div>
</body>
    <?php
    echo '<link rel="stylesheet" type="text/css" href="home.css">';

    echo "<h1>" . htmlspecialchars($gerecht) . "</h1>";

    echo "<p><strong>Ingrediënten:</strong><br>" . implode('<br>', $ingredienten) . "</p>";

    
    echo "<p><strong>Bereidingswijze:</strong><br>" . nl2br(htmlspecialchars($bereidingswijze)) . "</p>";

} else {
    echo "<p>Recept niet gevonden.</p>";
}
?>

