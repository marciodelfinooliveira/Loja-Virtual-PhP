<?php
require '../src/conexao-bd.php';
require '../src/Usuario.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = Usuario::buscarPorId($_SESSION['idusuario']);

$idusuario = $usuario->getId();

$query = "SELECT livros.*, carrinho.quantidade FROM carrinho
          JOIN livros ON carrinho.idlivro = livros.idlivro
          WHERE carrinho.idusuario = :idusuario";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':idusuario', $idusuario);
$stmt->execute();
$livrosNoCarrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['limparcarrinho'])) {
  $queryDelete = "DELETE FROM carrinho WHERE idusuario = :idusuario";
  $stmtDelete = $pdo->prepare($queryDelete);
  $stmtDelete->bindParam(':idusuario', $idusuario);
  $stmtDelete->execute();

  header("Location: ../index.php");
  exit();
}

if (isset($_POST['idlivro']) && isset($_POST['removerLivro'])) {
  $idlivroRemover = $_POST['idlivro'];
  $idusuario = $usuario->getId();

  $queryVerificarQuantidade = "SELECT quantidade FROM carrinho WHERE idusuario = :idusuario AND idlivro = :idlivro";
  $stmtVerificarQuantidade = $pdo->prepare($queryVerificarQuantidade);
  $stmtVerificarQuantidade->bindParam(':idusuario', $idusuario);
  $stmtVerificarQuantidade->bindParam(':idlivro', $idlivroRemover);
  $stmtVerificarQuantidade->execute();

  $quantidadeLivro = $stmtVerificarQuantidade->fetchColumn();

  if ($quantidadeLivro > 1) {

      $queryDiminuirQuantidade = "UPDATE carrinho SET quantidade = quantidade - 1 WHERE idusuario = :idusuario AND idlivro = :idlivro";
      $stmtDiminuirQuantidade = $pdo->prepare($queryDiminuirQuantidade);
      $stmtDiminuirQuantidade->bindParam(':idusuario', $idusuario);
      $stmtDiminuirQuantidade->bindParam(':idlivro', $idlivroRemover);
      $stmtDiminuirQuantidade->execute();
  } else {

      $queryRemoverLivro = "DELETE FROM carrinho WHERE idusuario = :idusuario AND idlivro = :idlivro";
      $stmtRemoverLivro = $pdo->prepare($queryRemoverLivro);
      $stmtRemoverLivro->bindParam(':idusuario', $idusuario);
      $stmtRemoverLivro->bindParam(':idlivro', $idlivroRemover);
      $stmtRemoverLivro->execute();
  }

  header('Location: carrinho.php');
  exit();
}

?>

<?php include '../shared/header.php'; ?>

<main>

  <section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                        <div style="display: flex; align-items: center; padding: 5px;">
                            <h6 style="flex: 2; margin-bottom: 0;">Título</h6>
                            <h6 style="flex: 2; margin-bottom: 0;">Autor</h6>
                            <h6 style="flex: 1; margin-bottom: 0;">Preço</h6>
                            <h6 style="flex: 1; margin-bottom: 0;">Quantidade</h6>
                        </div>
                        <?php foreach($livrosNoCarrinho as $livro): ?>
                            <div class="list-group-item" style="display: flex; align-items: center; padding: 10px;">
                                <h5 style="flex: 2; margin-bottom: 0;"><?= $livro["nomelivro"]; ?></h5>
                                <p style="flex: 2; margin-bottom: 0;"><?= $livro["nomeautor"]; ?></p>
                                <p style="flex: 1; margin-bottom: 0;"><?= "R$ " . $livro["preco"]; ?></p>
                                <p style="flex: 1; margin-bottom: 0;"><?= $livro["quantidade"]; ?></p>
                                <form method="post">
                                    <input type="hidden" name="idlivro" value="<?= $livro['idlivro']; ?>">
                                    <button type="submit" name="removerLivro" class="btn btn-sm btn-outline-danger">Remover</button>
                                </form>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $totalPagar = 0;
                foreach ($livrosNoCarrinho as $livro) {
                    $totalPagar += $livro['preco'] * $livro['quantidade'];
                }
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p style="font-size: 1.5em; font-weight: bold; color: red;">Total a Pagar: R$ <?= $totalPagar; ?></p>
                            <form method="post">
                                <button type="submit" name="limparcarrinho" class="btn btn-danger mt-3">Limpar Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

  </section>

</main>

<?php include '../shared/footer.php'; ?>
