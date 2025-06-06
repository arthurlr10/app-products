<?php
    /* $host = "db";
    $username = "root";
    $password = "root";
    $db = "gestion_produits"; */

    $host = getenv('DB_HOST') ?: 'mysql';
    $dbName = getenv('DB_NAME') ?: 'gestion_produits';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASS') ?: 'root';

    // Connexion avec pdo mysql
    $db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
?>