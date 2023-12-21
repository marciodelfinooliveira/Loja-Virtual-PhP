<?php

define('IMAGE_PATH', 'assets/img/');
require_once('../src/conexao-bd.php');

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

<?php include '../shared/header.php'; ?>
<link href="../assets/dist/css/styles_detalheslivro.css" rel="stylesheet">

<main>

  <section>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= "../" .  $livro['imagem']; ?>" class="card-img-top" alt="Capa do Livro">
            </div>
            <div class="col-md-6">
                <h2><?= $livro['nomelivro']; ?></h2>
                <p>Autor: <?= $livro['nomeautor']; ?></p>
                <p>Descrição: <?= $livro['descricao']; ?></p>
                <p>Preço: R$ <?= $livro['preco']; ?></p>
                <form action="<?php echo isset($_SESSION['idusuario']) ? 'carrinhobd.php' : '../autenticacao/login.php'; ?>" method="post">
                  <input type="hidden" name="idlivro" value="<?= $livro['idlivro']; ?>">
                  <label for="quantidade">Quantidade:</label>
                  <input type="number" id="quantidade" name="quantidade" value="1" min="1" max="10">
                  <button type="submit" class="btn btn-sm btn-outline-secondary btn-add-cart">
                      <?= isset($_SESSION['idusuario']) ? 'Adicionar ao Carrinho' : 'Adicionar ao Carrinho'; ?>
                  </button>
                </form>
            </div>
        </div>
    </div>

  </section>

</main>

<?php include '../shared/footer.php'; ?>

