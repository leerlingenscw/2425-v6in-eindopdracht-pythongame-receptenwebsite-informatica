<?php
session_start();

$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/wedstrijd.db';
$db = new SQLite3($db_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gerecht = trim($_POST['gerecht'] ?? '');


    $stmt = $db->prepare("SELECT wedstrijd_id, gerecht);
    $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);
}
?>