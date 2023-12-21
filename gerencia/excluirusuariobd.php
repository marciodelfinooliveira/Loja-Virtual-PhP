<?php
    
    require '../src/conexao-bd.php';
    require '../src/Usuario.class.php';

    $usuario = isset($_GET['id']) ? $_GET['id'] : null;

    $sql = "DELETE FROM usuarios WHERE idusuario = :idusuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idusuario', $usuario, PDO::PARAM_INT);
    $stmt->execute();
    
        
        header('Location: admin.php');
        exit();

?>