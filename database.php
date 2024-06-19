<?php
 
$host = 'localhost';
$port = 3306;
$dbName = 'gestionB';
$user = 'root';
$password = '';
 
$dsn = "mysql:host={$host};port={$port}; dbname={$dbName}; charset=utf8";
 
try{
    $pdo = new PDO($dsn, $user, $password);
    echo 'Connection succef :';
} catch(PDOException $e){
    echo 'Connection Failed : ' . $e->getMessage();
}