<?php
$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);



$query = $db->query("SELECT naam.gerecht AS gerecht, naam.gerecht_id FROM naam");

if ($query) {
  
    echo "<div class='recept-container'>";

    while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
        $gerecht = $row['gerecht'];  
        $gerecht_id = $row['gerecht_id']; 

      
        echo "<div class='recept-block'>";
        echo "<a href='recept.php?gerecht_id=$gerecht_id'>";
        echo "<h2>" . htmlspecialchars($gerecht) . "</h2>";
        echo "</a>";
        echo "</div>";
    }

  
    echo "</div>";
} else {
    echo "<p>Geen recepten gevonden.</p>";
}
?>