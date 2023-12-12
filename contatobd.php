<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = Usuario::buscarPorId($_SESSION['idusuario']);
$nome = $usuario->getNome();
$email = $usuario->getEmail();
$mensagem = $_POST["mensagem"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = $_POST["mensagem"];

    $stmt = $pdo->prepare("INSERT INTO contatos (nomecontato, emailcontato, mensagem) VALUES (:nomecontato, :emailcontato, :mensagem)");
    $stmt->bindParam(':nomecontato', $nome);
    $stmt->bindParam(':emailcontato', $email);
    $stmt->bindParam(':mensagem', $mensagem);
    try {
        $stmt->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

?>