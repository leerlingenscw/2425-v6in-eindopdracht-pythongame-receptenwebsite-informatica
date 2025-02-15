<?php

$db = new PDO("sqlite:recepten~8b25679.db");


$query = $db->query("SELECT naam, ingrediënten, recept FROM recepten");


if ($query) {
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='recept'>";
        echo "<h2>" . htmlspecialchars($row['naam']) . "</h2>";
        echo "<p><strong>Ingrediënten:</strong><br>" . nl2br(htmlspecialchars($row['ingrediënten'])) . "</p>";
        echo "<p><strong>Bereiding:</strong><br>" . nl2br(htmlspecialchars($row['recept'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Geen recepten gevonden.</p>";
}
?>
