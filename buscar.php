<?php
require 'src/conexao-bd.php';
require 'Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$livros = [];

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];

    try {

        $stmt = $pdo->prepare("SELECT idlivro, nomelivro, nomeautor, descricao, preco, tema, imagem FROM livros WHERE nomelivro LIKE :query");
        $stmt->bindValue(':query', "%$query%");
        $stmt->execute();

        $livrosEncontrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<?php include 'shared/header.php'; ?>
<link href="assets/dist/css/styles_busca.css" rel="stylesheet">

<main>

  <?php if (isset($livrosEncontrados) && !empty($livrosEncontrados)): ?>
        <div class="container">
            <h2 class="text-center my-4">Resultados da busca por: "<?php echo htmlspecialchars($query); ?>"</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($livrosEncontrados as $livro): ?>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <a href="detalhes_livro.php?id=<?= $livro['idlivro']; ?>" style="text-decoration: none; color: inherit;">
                                <img src="<?= $livro["imagem"]; ?>" class="card-img-top">
                                <div class="card-body">
                                    <span class="card-price"><?= "R$ " . $livro["preco"]; ?></span>
                                    <a href="detalheslivro.php?id=<?= $livro['idlivro']; ?>" class="btn btn-sm btn-outline-secondary btn-details">Detalhes</a>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <h2 class="text-center my-4">Nenhum livro encontrado para a busca: "<?php echo htmlspecialchars($query); ?>"</h2>
        </div>
    <?php endif; ?>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($livros as $livro): ?>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <a href="detalheslivro.php?id=<?= $livro['idlivro']; ?>" style="text-decoration: none; color: inherit;">
                                <img src="<?= $livro["imagem"]; ?>" class="card-img-top">
                                <div class="card-body">
                                    <span class="card-price"><?= "R$ " . $livro["preco"]; ?></span>
                                    <a href="detalheslivro.php?id=<?= $livro['idlivro']; ?>" class="btn btn-sm btn-outline-secondary btn-details">Detalhes</a>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php include 'shared/footer.php'; ?>
