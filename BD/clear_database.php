<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=ges_stock", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "erreur de connexion :".$e->getMessage();
}

$pdo->exec("DROP TABLE IF EXISTS vente");
$pdo->exec("DROP TABLE IF EXISTS commande");
$pdo->exec("DROP TABLE IF EXISTS client");
$pdo->exec("DROP TABLE IF EXISTS fournisseur");
$pdo->exec("DROP TABLE IF EXISTS article");

echo "successfully";