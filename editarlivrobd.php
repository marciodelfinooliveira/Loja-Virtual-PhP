<?php
require_once('src/conexao-bd.php');

if (isset($_GET['id'])) {
    $idlivro = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            
            $query = "UPDATE livros SET nomelivro = :nomelivro, nomeautor = :nomeautor, descricao = :descricao, preco = :preco, tema = :tema WHERE idlivro = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nomelivro', $_POST['nomelivro']);
            $stmt->bindParam(':nomeautor', $_POST['nomeautor']);
            $stmt->bindParam(':descricao', $_POST['descricao']);
            $stmt->bindParam(':preco', $_POST['preco']);
            $stmt->bindParam(':tema', $_POST['tema']);
            $stmt->bindParam(':id', $idlivro);
            $stmt->execute();


            if ($_FILES['novaimagem']['tmp_name'] != '') {
                $nomearquivo = $_FILES['novaimagem']['name'];
                $caminhotemporario = $_FILES['novaimagem']['tmp_name'];
            
                $target_dir = "assets/img/";
                $novocaminhoimagem = $target_dir . basename($nomearquivo);
            
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($novocaminhoimagem, PATHINFO_EXTENSION));
            
                $extensoes_permitidas = ["jpg", "jpeg", "png", "gif", "webp"];
            
                if (!in_array($imageFileType, $extensoes_permitidas)) {
                    echo "Desculpe, apenas arquivos JPG, JPEG, PNG, GIF e WEBP são permitidos.";
                    $uploadOk = 0;
                } else {
                    if (move_uploaded_file($caminhotemporario, $novocaminhoimagem)) {
                        $nomearquivo_com_prefixo = 'assets/img/' . $nomearquivo;
            
                        $stmt = $pdo->prepare("UPDATE livros SET imagem = :imagem WHERE idlivro = :id");
                        $stmt->bindParam(':imagem', $nomearquivo_com_prefixo);
                        $stmt->bindParam(':id', $idlivro);
                        $stmt->execute();
                    } else {
                        echo "Erro ao fazer upload da nova imagem.";
                    }
                }
            }

            header("Location: admin.php");
            exit();

        } catch(PDOException $e) {
            echo "Erro ao editar livro: " . $e->getMessage();
        }
    }
} else {
    echo "ID do livro não fornecido.";
}
?>
