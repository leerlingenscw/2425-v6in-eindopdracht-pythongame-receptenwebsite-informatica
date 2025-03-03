<?php
$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/wedstrijd.db';
$db = new SQLite3($db_path, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
$db->enableExceptions(true); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gerecht = trim($_POST['gerecht'] ?? '');

    if (empty($gerecht)) {
        die("Fout: Gerecht mag niet leeg zijn.");
    }

    $stmt = $db->prepare("SELECT COUNT(*) as count FROM uploaden WHERE gerecht = :gerecht");
    $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if (!$row) {
        die("Fout: Probleem met databasequery of tabel bestaat niet.");
    }

    if ($row['count'] > 0) {
        die("Fout: Dit gerecht is al ingediend.");
    }

    try {
        $stmt = $db->prepare("INSERT INTO uploaden (gerecht) VALUES (:gerecht)");
        $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
        $stmt->execute();

        header("Location: /website/wedstrijduploaden.html");
        exit(); 
    } catch (Exception $e) {
        die("Fout: Databasefout - " . $e->getMessage());
    }
}
?>