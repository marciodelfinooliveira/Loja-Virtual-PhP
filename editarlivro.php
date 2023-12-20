<?php
require_once('src/conexao-bd.php');

if (isset($_GET['id'])) {
    $iddolivro = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM livros WHERE idlivro = :id");
    $stmt->bindParam(':id', $iddolivro);
    $stmt->execute();
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($livro) {

    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não fornecido.";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  
?>
  
<?php include 'shared/header.php'; ?>

<main>
    
    <section>
        <div class="container">
            <br>
            <h2>Editar Livro</h2>
            <form action="editarlivrobd.php?id=<?= $livro['idlivro']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nomelivro" class="form-label">Nome do Livro:</label>
                    <input type="text" name="nomelivro" class="form-control" value="<?= $livro['nomelivro']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nomeautor" class="form-label">Nome do Autor:</label>
                    <input type="text" name="nomeautor" class="form-control" value="<?= $livro['nomeautor']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" class="form-control" required><?= $livro['descricao']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="number" name="preco" step="0.01" class="form-control" value="<?= $livro['preco']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tema" class="form-label">Tema:</label>
                    <input type="text" name="tema" class="form-control" value="<?= $livro['tema']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="imagem" class="form-label">Capa do Livro:</label>
                    <input type="file" name="novaimagem" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Editar Livro" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>

</main>

<?php include 'shared/footer.php'; ?>