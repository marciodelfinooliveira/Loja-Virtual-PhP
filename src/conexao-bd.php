<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$localhost = "localhost";
$user = "root";
$password = "";
$database = "cantodaspalavras";

global $pdo;

try{

    $pdo = new PDO("mysql:dbname=".$database."; host=".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    
}catch(PDOException $e){
    
    echo "Erro: ".$e->getMessage();
    exit;
}
?>
