<?php
    
    require 'src/conexao-bd.php';
    require 'Usuario.class.php';

    
    $contato = isset($_GET['id']) ? $_GET['id'] : null;

    
    $sql = "DELETE FROM contatos WHERE idcontato = :idcontato";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idcontato', $contato, PDO::PARAM_INT);
    $stmt->execute();
    
        
        header('Location: admin.php');
        exit();

?>