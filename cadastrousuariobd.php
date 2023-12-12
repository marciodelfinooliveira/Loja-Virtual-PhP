<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $stmt = $pdo->prepare("INSERT INTO usuarios (nomeusuario, email, senha) VALUES (:nomeusuario, :email, :senha)");
    $stmt->bindParam(':nomeusuario', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', md5($senha));
    try {
        $stmt->execute();
        header("Location: login.php");
        echo "Dados inseridos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

?>