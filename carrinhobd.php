<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = Usuario::buscarPorId($_SESSION['idusuario']);

if (isset($_POST['idlivro'])) {

    $idlivro = $_POST['idlivro'];
    $idusuario = $usuario->getId();

    $queryVerificar = "SELECT * FROM carrinho WHERE idusuario = :idusuario AND idlivro = :idlivro";
    $stmtVerificar = $pdo->prepare($queryVerificar);
    $stmtVerificar->bindParam(':idusuario', $idusuario);
    $stmtVerificar->bindParam(':idlivro', $idlivro);
    $stmtVerificar->execute();

    $livroNoCarrinho = $stmtVerificar->fetch();

    if ($livroNoCarrinho) {
       
        $queryAtualizar = "UPDATE carrinho SET quantidade = quantidade + 1 WHERE idusuario = :idusuario AND idlivro = :idlivro";
        $stmtAtualizar = $pdo->prepare($queryAtualizar);
        $stmtAtualizar->bindParam(':idusuario', $idusuario);
        $stmtAtualizar->bindParam(':idlivro', $idlivro);
        $stmtAtualizar->execute();

        header('Location: index.php');
    } else {
        
        $queryAdicionar = "INSERT INTO carrinho (idusuario, idlivro, quantidade) VALUES (:idusuario, :idlivro, 1)";
        $stmtAdicionar = $pdo->prepare($queryAdicionar);
        $stmtAdicionar->bindParam(':idusuario', $idusuario);
        $stmtAdicionar->bindParam(':idlivro', $idlivro);
        $stmtAdicionar->execute();

        header('Location: index.php');
    }
} else {

    echo "ID do livro não foi fornecido!";
}

?>

