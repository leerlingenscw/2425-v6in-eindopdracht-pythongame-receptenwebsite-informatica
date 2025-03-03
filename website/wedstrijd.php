<?php
$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/wedstrijd.db';
$db = new SQLite3($db_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gerecht = trim($_POST['gerecht'] ?? '');

    $stmt = $db->prepare("SELECT COUNT(*) as count FROM wedstrijd WHERE gerecht = :gerecht");
    $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if ($row['count'] > 0) {
        header("Location: wedstrijd.html?error=gerecht");
        exit();
    }

    $stmt = $db->prepare("INSERT INTO wedstrijd (gerecht) VALUES (:gerecht)");
    $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);

    if ($stmt->execute()) {
        header("Location: /website/wedstrijduploaden.html");
    }
}
?>