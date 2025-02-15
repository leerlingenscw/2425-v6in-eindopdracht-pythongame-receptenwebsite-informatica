<?php

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

    
    echo "<h1>" . htmlspecialchars($gerecht) . "</h1>";

    echo "<p><strong>Ingrediënten:</strong><br>" . implode('<br>', $ingredienten) . "</p>";

    
    echo "<p><strong>Bereidingswijze:</strong><br>" . nl2br(htmlspecialchars($bereidingswijze)) . "</p>";

} else {
    echo "<p>Recept niet gevonden.</p>";
}
?>