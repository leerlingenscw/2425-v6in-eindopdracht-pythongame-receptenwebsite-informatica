<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pad naar je database
$db_path =  '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);

if (!$db) {
    die("Fout bij het verbinden met de database.");
}

// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gerecht = trim($_POST['gerecht']);
    $ingredienten = explode("\n", trim($_POST['ingredienten']));
    $bereidingswijze = trim($_POST['bereidingswijze']);

    // Start een transactie om de gegevens correct toe te voegen
    $db->exec('BEGIN;');

    try {
        // ✅ Stap 1: Voeg het gerecht toe aan de 'naam' tabel
        $stmt = $db->prepare("INSERT INTO naam (gerecht) VALUES (:gerecht)");
        $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
        $stmt->execute();

        // ✅ Stap 2: Haal het gerecht_id op dat zojuist is toegevoegd
        $gerecht_id = $db->lastInsertRowID();
        echo "Laatst toegevoegde ID: " . $gerecht_id;
exit(); // Stop de code hier om te testen

        if (!$gerecht_id) {
            throw new Exception("Fout: gerecht_id niet gegenereerd!");
        }

        // ✅ Stap 3: Voeg bereidingswijze toe aan de 'recept' tabel
        $stmt = $db->prepare("INSERT INTO recept (gerecht_id, instructies) VALUES (:gerecht_id, :instructies)");
        $stmt->bindValue(':gerecht_id', $gerecht_id, SQLITE3_INTEGER);
        $stmt->bindValue(':instructies', $bereidingswijze, SQLITE3_TEXT);
        $stmt->execute();

        // ✅ Stap 4: Voeg ingrediënten toe aan de 'ingrediënten' tabel
        $stmt = $db->prepare("INSERT INTO ingrediënten (gerecht_id, ingrediënt, hoeveelheid) VALUES (:gerecht_id, :ingredient, :hoeveelheid)");

        foreach ($ingredienten as $item) {
            $parts = explode(' - ', trim($item));
            if (count($parts) == 2) {
                $stmt->bindValue(':gerecht_id', $gerecht_id, SQLITE3_INTEGER);
                $stmt->bindValue(':ingredient', trim($parts[0]), SQLITE3_TEXT);
                $stmt->bindValue(':hoeveelheid', trim($parts[1]), SQLITE3_TEXT);
                $stmt->execute();
            }
        }

        // ✅ Stap 5: Bevestig de transactie
        $db->exec('COMMIT;');

        // ✅ Stap 6: Stuur door naar de upload-pagina met succesbericht
        header("Location: uploaden.html?status=succes");
        exit();

    } catch (Exception $e) {
        // ❌ Als er een fout is, rollback de database en toon een foutmelding
        $db->exec('ROLLBACK;');
        die("❌ Fout bij toevoegen recept: " . $e->getMessage());
    }
}
?>