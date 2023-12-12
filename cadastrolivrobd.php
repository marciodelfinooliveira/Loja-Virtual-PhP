<?php

require 'src/conexao-bd.php';
require 'Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nomelivro"];
    $nomeAutor = $_POST["nomeautor"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $tema = $_POST["tema"]; 

    $target_dir = "assets/img/"; 
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    if ($_FILES["imagem"]["size"] > 500000) {
        echo "Desculpe, o arquivo é muito grande.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não pôde ser enviado.";
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES["imagem"]["name"])) . " foi enviado com sucesso.";
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO livros (nomelivro, nomeautor, descricao, preco, tema, imagem) VALUES (:nomelivro, :nomeautor, :descricao, :preco, :tema, :imagem)");
    $stmt->bindParam(':nomelivro', $nome);
    $stmt->bindParam(':nomeautor', $nomeAutor);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':tema', $tema);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':imagem', $target_file);

    try {

        $stmt->execute();
        header("Location: admin.php");
        echo "Dados inseridos com sucesso!";
    } catch (PDOException $e) {
    
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

?>