<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = Usuario::buscarPorId($_SESSION['idusuario']);

if (isset($_POST['idlivro']) && isset($_POST['quantidade'])) {
    $idlivro = $_POST['idlivro'];
    $quantidade = $_POST['quantidade'];
    $idusuario = $usuario->getId();

    $queryVerificar = "SELECT * FROM carrinho WHERE idusuario = :idusuario AND idlivro = :idlivro";
    $stmtVerificar = $pdo->prepare($queryVerificar);
    $stmtVerificar->bindParam(':idusuario', $idusuario);
    $stmtVerificar->bindParam(':idlivro', $idlivro);
    $stmtVerificar->execute();

    $livroNoCarrinho = $stmtVerificar->fetch();

    if ($livroNoCarrinho) {
        $queryAtualizar = "UPDATE carrinho SET quantidade = quantidade + :quantidade WHERE idusuario = :idusuario AND idlivro = :idlivro";
        $stmtAtualizar = $pdo->prepare($queryAtualizar);
        $stmtAtualizar->bindParam(':idusuario', $idusuario);
        $stmtAtualizar->bindParam(':idlivro', $idlivro);
        $stmtAtualizar->bindParam(':quantidade', $quantidade);
        $stmtAtualizar->execute();
    } else {
        $queryAdicionar = "INSERT INTO carrinho (idusuario, idlivro, quantidade) VALUES (:idusuario, :idlivro, :quantidade)";
        $stmtAdicionar = $pdo->prepare($queryAdicionar);
        $stmtAdicionar->bindParam(':idusuario', $idusuario);
        $stmtAdicionar->bindParam(':idlivro', $idlivro);
        $stmtAdicionar->bindParam(':quantidade', $quantidade);
        $stmtAdicionar->execute();
    }
    header('Location: index.php');
} else {
    echo "ID do livro ou quantidade não foram fornecidos!";
}
?>

