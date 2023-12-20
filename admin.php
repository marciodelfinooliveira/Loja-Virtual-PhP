<?php

define("IMAGE_PATH", "assets/img/");

require_once('src/conexao-bd.php');

$sql = 'SELECT idlivro, nomelivro, nomeautor, descricao, preco, tema, imagem FROM livros';
$livros = $pdo->query($sql, null);

$sql2 = 'SELECT idusuario, nomeusuario, email, gerente FROM usuarios';
$usuarios = $pdo->query($sql2, null);

$sql3 = 'SELECT idcontato, nomecontato, emailcontato, mensagem FROM contatos';
$contatos = $pdo->query($sql3, null);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<?php include 'shared/header.php'; ?>

<main>

  <section>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                        <div style="display: flex; align-items: center; padding: 5px;">
                            <h6 style="flex: 4; margin-bottom: 0;">Título</h6>
                            <h6 style="flex: 2; margin-bottom: 0;">Autor</h6>
                            <h6 style="flex: 2; margin-bottom: 0;">Preço</h6>
                            <h6 style="flex: 1; margin-bottom: 0; text-align: center;">Editar</h6>
                            <h6 style="flex: 1; margin-bottom: 0; text-align: center;">Excluir</h6>
                        </div>
                        <?php foreach($livros as $livro): ?>
                            <div class="list-group-item" style="display: flex; align-items: center; padding: 10px;">
                                <h5 style="flex: 2; margin-bottom: 0;"><?= $livro["nomelivro"]; ?></h5>
                                <p style="flex: 1; margin-bottom: 0;"><?= $livro["nomeautor"]; ?></p>
                                <p style="flex: 1; margin-bottom: 0;"><?= "R$ " . $livro["preco"]; ?></p>
                                <div class="btn-group" style="flex: 1;">
                                  <a href="editarlivro.php?id=<?= $livro['idlivro']; ?>" method="get">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Editar Livro</button>
                                  </a>
                                  <a href="excluirlivrobd.php?id=<?= $livro['idlivro']; ?>">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Excluir Livro</button>
                                  </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                        <div style="display: flex; align-items: center; padding: 5px;">
                            <h6 style="flex: 4; margin-bottom: 0;">Nome do Usuário</h6>
                            <h6 style="flex: 2; margin-bottom: 0;">Email</h6>
                            <h6 style="flex: 2; margin-bottom: 0;">Gerência</h6>
                            <h6 style="flex: 1; margin-bottom: 0; text-align: center;">Editar</h6>
                            <h6 style="flex: 1; margin-bottom: 0; text-align: center;">Excluir</h6>
                        </div>
                        <?php foreach($usuarios as $usuario): ?>
                            <div class="list-group-item" style="display: flex; align-items: center; padding: 10px;">
                                <h5 style="flex: 2; margin-bottom: 0;"><?= $usuario["nomeusuario"]; ?></h5>
                                <p style="flex: 1; margin-bottom: 0;"><?= $usuario["email"]; ?></p>
                                <p style="flex: 1; margin-bottom: 0;"><?= $usuario["gerente"] == 1 ? 'SIM' : 'NÃO'; ?></p>
                                <div class="btn-group" style="flex: 1;">
                                  <a href="editarusuario.php?id=<?= $usuario['idusuario']; ?>" method="get" >
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Editar Usuário</button>
                                  </a>
                                  <a href="excluirusuariobd.php?id=<?= $usuario['idusuario']; ?>">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Excluir Usuário</button>
                                  </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                        <div style="display: flex; align-items: center; padding: 5px;">
                            <h6 style="flex: 4; margin-bottom: 0;">Nome do Contato</h6>
                            <h6 style="flex: 4; margin-bottom: 0;">Email do Contato</h6>
                            <h6 style="flex: 4; margin-bottom: 0;">Mensagem</h6>
                            <h6 style="flex: 1; margin-bottom: 0;">Excluir</h6>
                        </div>
                        <?php foreach($contatos as $contato): ?>
                            <div class="list-group-item" style="display: flex; align-items: center; padding: 10px;">
                                <h5 style="flex: 4; margin-bottom: 0;"><?= $contato["nomecontato"]; ?></h5>
                                <p style="flex: 3; margin-bottom: 0;"><?= $contato["emailcontato"]; ?></p>
                                <p style="flex: 5; margin-bottom: 0;"><?= $contato["mensagem"]; ?></p>
                                <div class="btn-group" style="flex: 1;">
                                  <a href="excluircomentariobd.php?id=<?= $contato['idcontato']; ?>">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Excluir comentário</button>
                                  </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

</main>

<?php include 'shared/footer.php'; ?>

