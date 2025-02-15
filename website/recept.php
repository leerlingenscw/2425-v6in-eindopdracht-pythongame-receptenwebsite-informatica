<?php

$gerecht_id = $_GET['gerecht_id'];


$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);


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

if ($result) {
    $row = $result->fetchArray(SQLITE3_ASSOC);
    echo "<h1>" . htmlspecialchars($row['gerecht']) . "</h1>";
    echo "<p><strong>Ingrediënten:</strong><br>" . htmlspecialchars($row['ingrediënt']) . " - " . htmlspecialchars($row['hoeveelheid']) . "</p>";
    echo "<p><strong>Bereidingswijze:</strong><br>" . nl2br(htmlspecialchars($row['bereidingswijze'])) . "</p>";
} else {
    echo "<p>Recept niet gevonden.</p>";
}
?>
