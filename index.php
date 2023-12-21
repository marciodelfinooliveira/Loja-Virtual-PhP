<?php

require_once('src/conexao-bd.php');

$sql = 'SELECT idlivro, nomelivro, nomeautor, descricao, preco, tema, imagem FROM livros';
$livros = $pdo->query($sql, null);

if(isset($_GET['query']) && !empty($_GET['query'])) {
  $query = $_GET['query'];

  $stmt = $pdo->prepare("SELECT idlivro, nomelivro, nomeautor, descricao, preco, tema, imagem FROM livros WHERE nomelivro LIKE :query");
  $stmt->bindValue(':query', "%$query%");
  $stmt->execute();

  $livrosEncontrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<?php include('shared/header.php'); ?>
<link href="assets/dist/css/styles_index.css" rel="stylesheet">

<main>
  
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach($livros as $livro): ?>
          <div class="col-md-3">
            <div class="card shadow-sm">
                <a href="clientes/detalheslivro.php?id=<?= $livro['idlivro']; ?>" style="text-decoration: none; color: inherit;">
                    <img src="<?= $livro["imagem"]; ?>" class="card-img-top">
                    <div class="card-body">
                        <span class="card-price"><?= "R$ " . $livro["preco"]; ?></span>
                        <a href="clientes/detalheslivro.php?id=<?= $livro['idlivro']; ?>" class="btn btn-sm btn-outline-secondary btn-details">Detalhes</a>
                    </div>
                </a>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if(isset($livrosEncontrados) && !empty($livrosEncontrados)): ?>
          <div class="container">
              <h2 class="text-center my-4">Resultados da busca por: "<?php echo htmlspecialchars($query); ?>"</h2>
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <?php foreach($livrosEncontrados as $livro): ?>
                      <div class="col-md-3">
                          <div class="card shadow-sm">
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

</main>

<?php include 'shared/footer.php'; ?>

