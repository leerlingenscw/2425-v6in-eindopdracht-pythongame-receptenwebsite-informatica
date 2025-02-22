<?php
session_start();
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: /sign_in/inlog.html");
    exit();
}

$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';


$db = new SQLite3($db_path);


$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';


$query = "
    SELECT naam.gerecht_id, naam.gerecht, GROUP_CONCAT(ingrediënten.ingrediënt || ' ' || ingrediënten.hoeveelheid) AS ingrediënten
    FROM naam
    LEFT JOIN ingrediënten ON naam.gerecht_id = ingrediënten.gerecht_id
    WHERE naam.gerecht LIKE :searchTerm 
    OR ingrediënten.ingrediënt LIKE :searchTerm
    GROUP BY naam.gerecht_id
";


$stmt = $db->prepare($query);
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', SQLITE3_TEXT);


$result = $stmt->execute();


if ($result) {
    $recipes = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $recipes[] = $row;
    }

    if (count($recipes) > 0) {
        foreach ($recipes as $recipe) {
            echo "<li>";
            echo "<strong><a href='recept.php?gerecht_id=" . htmlspecialchars($recipe['gerecht_id']) . "'>" . htmlspecialchars($recipe['gerecht']) . "</a></strong><br>";
            echo "Ingrediënten: " . htmlspecialchars($recipe['ingrediënten']) . "<br>";
            echo "</li>";
        }
    } else {
        echo "<li>Geen recepten gevonden</li>";
    }
} else {
    echo "<li>Er is een fout opgetreden bij het uitvoeren van de zoekopdracht.</li>";
}
?>
