<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$localhost = getenv('DB_HOST');
$user = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=".$database.";host=".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}
?>
