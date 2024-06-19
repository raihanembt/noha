<?php
session_start();
require('database.php');

if (empty($_POST['nom']) || empty($_POST['modepass'])) {
    
    $_SESSION['loginError'] = "Les données d'authentification sont obligatoires";
    header("Location: connexion.php");
    exit;
}


$statement = $pdo->prepare("SELECT * FROM chef WHERE nom = :nom AND modepass = :modepass");
$statement->execute([
    ':nom' => $_POST['nom'],
    ':modepass' => $_POST['modepass']
]);
$admin = $statement -> fetch(PDO::FETCH_ASSOC);
if ($admin) {
    $_SESSION['nom'] = $admin['nom']; 
    unset($_SESSION["loginError"]);
    header("Location: afficher.php");
    exit;
} else{
    $_SESSION['loginError'] = "Les données d'authentification sont incorrects ";
    
    header('Location: connexion.php');
    exit;
}

?>