<?php
    
    require 'src/conexao-bd.php';
    require 'Usuario.class.php';

    
    $livroId = isset($_GET['id']) ? $_GET['id'] : null;

    
    $sql = "DELETE FROM livros WHERE idlivro = :idlivro";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idlivro', $livroId, PDO::PARAM_INT);
    $stmt->execute();
    
        
        header('Location: admin.php');
        exit();

?>