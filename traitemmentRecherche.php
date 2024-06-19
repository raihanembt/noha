<?php
require 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT * FROM livre WHERE titre = :titre";
        $statement = $pdo->prepare($sql);
        $titre= $_POST['titre'];
        $statement->execute([
            ":titre" => $titre
        ]);
        if ($statement->rowCount() > 0) {
            echo "Le livre existe dans la bibliothèque.";
        } else {
            echo "Le livre n'existe pas dans la bibliothèque.";
        }
    }
?>
