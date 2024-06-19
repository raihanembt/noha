<?php 
require 'database.php';
if($_SERVER['REQUEST_METHOD'] ==  'POST'){
    $statement = $pdo -> prepare('UPDATE livre SET titre = :titre , auteur = :auteur , AnnePublication= :AnnePublication, id = :id WHERE id = :id');
    $id=$_POST['id'];
    $titre = $_POST['titre'];
    $auteur= $_POST['auteur'];
    $AnnePublication = $_POST['AnnePublication'];
    $statement -> execute([
        ":titre" => $titre,
        ':auteur' => $auteur,
        ':AnnePublication' => $AnnePublication,
    ]);
    header("Location:afficher.php");
}
?>