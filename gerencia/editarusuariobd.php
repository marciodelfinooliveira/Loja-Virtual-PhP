<?php
require_once('../src/conexao-bd.php');

if (isset($_GET['id'])) {
    $idusuario = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $query = "UPDATE usuarios SET nomeusuario = :nomeusuario, email = :email, senha = :senha, gerente = :gerente WHERE idusuario = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nomeusuario', $_POST['nomeusuario']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':senha', md5($_POST['senha']));
            $stmt->bindParam(':gerente', $_POST['gerente']);
            $stmt->bindParam(':id', $idusuario);
            $stmt->execute();

            header("Location: admin.php");
            exit();
        } catch(PDOException $e) {
            echo "Erro ao editar usuário: " . $e->getMessage();
        }
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
