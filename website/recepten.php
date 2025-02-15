<?php

$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);


if (!$db) {
    echo "Fout bij het verbinden met de database.";
    exit();
}


$query = $db->query("SELECT naam.gerecht AS gerecht, 
                            ingrediënten.ingrediënt, 
                            ingrediënten.hoeveelheid, 
                            recept.instructies AS bereidingswijze,
                            naam.gerecht_id
                     FROM naam
                     JOIN ingrediënten ON naam.gerecht_id = ingrediënten.gerecht_id
                     JOIN recept ON naam.gerecht_id = recept.gerecht_id");

$gerechten = [];

if ($query) {
    while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
       
        $gerecht_id = $row['gerecht_id'];
        
        
        if (!isset($gerechten[$gerecht_id])) {
            $gerechten[$gerecht_id] = [
                'gerecht' => $row['gerecht'],
                'ingrediënten' => [],
                'instructies' => $row['bereidingswijze']
            ];
        }

        
        $gerechten[$gerecht_id]['ingrediënten'][] = $row['ingrediënt'] . ' - ' . $row['hoeveelheid'];
    }


    foreach ($gerechten as $gerecht) {
        echo "<div class='recept'>";
        echo "<h2>" . htmlspecialchars($gerecht['gerecht']) . "</h2>";
        echo "<p><strong>Ingrediënten:</strong><br>" . implode('<br>', $gerecht['ingrediënten']) . "</p>";
        echo "<p><strong>Bereiding:</strong><br>" . nl2br(htmlspecialchars($gerecht['instructies'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Geen recepten gevonden.</p>";
}
?>
