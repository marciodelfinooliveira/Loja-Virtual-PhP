<?php

define('IMAGE_PATH', 'assets/img/');
require_once('src/conexao-bd.php');

$sql = 'SELECT idlivro, nomelivro, nomeautor, descricao, preco, tema, imagem FROM livros';
$livros = $pdo->query($sql, null);

?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    
  </head>

  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    

<header class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a href="index.php" class="navbar-brand d-flex align-items-center">
      </svg>
      <strong>Canto das Palavras</strong>
    </a>
    <ul class="nav">
      <?php
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      if(isset($_SESSION['idusuario'])){
        echo '<li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="carrinho.php">Carrinho</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="contato.php">Contato</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="sobre.php">Sobre</a>
              </li>'
              ;
      } else {
        echo '<li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="cadastrousuario.php">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="sobre.php">Sobre</a>
              </li>'
              ;
      }?>
    </ul>
  </div>
</header>

<main>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach($livros as $livro): ?>
          <div class="col">
              <div class="card shadow-sm">
                  <div class="card-header">
                      <h5 class="card-title text-center"><?= $livro["nomelivro"]; ?></h5>
                  </div>
                  <img src="<?=$livro["imagem"];?>" class="card-img-top" width="80" height="500">
                  <div class="card-body">
                      <p class="card-text"><?= $livro["descricao"]; ?></p>
                      <p class="text-body-secondary"><?= $livro["nomeautor"]; ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                          <?php if (session_status() == PHP_SESSION_NONE) {
                              session_start();
                          } ?>
                          <?php if (isset($_SESSION['idusuario'])): ?>
                              <form action="carrinhobd.php" method="post">
                                  <input type="hidden" name="idlivro" value="<?= $livro['idlivro']; ?>">
                                  <button type="submit" class="btn btn-sm btn-outline-secondary" name="adicionar_carrinho">Adicionar ao Carrinho</button>
                              </form>
                          <?php else: ?>
                              <a href="login.php">
                                  <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                              </a>
                          <?php endif; ?>
                          <small class="text-body-secondary"><?= "R$ " . $livro["preco"]; ?></small>
                          <small class="text-body-secondary"><?= $livro["tema"]; ?></small>
                      </div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Voltar ao Topo</a>
    </p>
    <p class="mb-1">Todos os direitos reservados aos desenvolvedores do Grupo 4 - Programaçao Web - Análise e Desenvolvimento de Sistemas - P1 </p>
    
  </div>
</footer>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
