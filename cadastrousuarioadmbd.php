<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Processar os dados do formulário

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $gerente = $_POST["gerente"];

    // Inserir dados no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (nomeusuario, email, senha, gerente) VALUES (:nomeusuario, :email, :senha, :gerente)");
    $stmt->bindParam(':nomeusuario', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', md5($senha));
    $stmt->bindParam(':gerente', $gerente);

    try {
        $stmt->execute();
        header("Location: admin.php");
        echo "Dados inseridos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

?>