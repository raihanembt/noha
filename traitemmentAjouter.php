<?php
require 'database.php';
try {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $AnnePublication = $_POST['AnnePublication'];
    $sql = "INSERT INTO livre (titre, auteur, AnnePublication) VALUES (:titre, :auteur, :AnnePublication)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':AnnePublication', $AnnePublication);

    $stmt->execute();
    header("Location:afficher.php");
    echo "Nouveau livre ajouté avec succès";
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
$pdo = null;

?>


