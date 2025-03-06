<?php
session_start();
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: /sign_in/inlog.html");
    exit();
}


error_reporting(E_ALL);
ini_set('display_errors', 1);


$db_path = '/workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/recepten.db';
$db = new SQLite3($db_path);


if (!$db) {
   die("Fout bij het verbinden met de database.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $gerecht = trim($_POST['gerecht']);
   $ingredienten = explode("\n", trim($_POST['ingredienten']));
   $bereidingswijze = trim($_POST['bereidingswijze']);


   $db->exec('BEGIN;');


   try {
        $stmt = $db->prepare("INSERT INTO naam (gerecht) VALUES (:gerecht)");
       $stmt->bindValue(':gerecht', $gerecht, SQLITE3_TEXT);
       if (!$stmt->execute()) {
           throw new Exception("Fout bij toevoegen gerecht: " . $db->lastErrorMsg());
       }


       $gerecht_id = $db->lastInsertRowID();
       if (!$gerecht_id) {
           throw new Exception("Fout: gerecht_id niet gegenereerd!");
       }




       $stmt = $db->prepare("INSERT INTO recept (gerecht_id, instructies) VALUES (:gerecht_id, :instructies)");
       $stmt->bindValue(':gerecht_id', $gerecht_id, SQLITE3_INTEGER);
       $stmt->bindValue(':instructies', $bereidingswijze, SQLITE3_TEXT);
       if (!$stmt->execute()) {
           throw new Exception("Fout bij toevoegen instructies: " . $db->lastErrorMsg());
       }


   
       $stmt = $db->prepare("INSERT INTO ingrediënten (gerecht_id, ingrediënt, hoeveelheid) VALUES (:gerecht_id, :ingredient, :hoeveelheid)");
       foreach ($ingredienten as $item) {
           $parts = explode(' - ', trim($item));
           if (count($parts) == 2) {
               $stmt->bindValue(':gerecht_id', $gerecht_id, SQLITE3_INTEGER);
               $stmt->bindValue(':ingredient', trim($parts[0]), SQLITE3_TEXT);
               $stmt->bindValue(':hoeveelheid', trim($parts[1]), SQLITE3_TEXT);
               if (!$stmt->execute()) {
                   throw new Exception("Fout bij toevoegen ingrediënt: " . $db->lastErrorMsg());
               }
           } else {
               throw new Exception("Ingrediënten moeten in het formaat 'ingrediënt - hoeveelheid' zijn.");
           }
       }


   
       $db->exec('COMMIT;');


  
      
       header("Location: uploaden.html?status=succes");
       exit();


   } catch (Exception $e) {
      
       $db->exec('ROLLBACK;');
       die("❌ Fout bij toevoegen recept: " . $e->getMessage());
   }
}
?>
