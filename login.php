<?php

define("IMAGE_PATH", "assets/img/");

require_once('src/conexao-bd.php');

if(isset($_SESSION['login_error'])){
  $error = $_SESSION['login_error'];
  unset($_SESSION['login_error']);
}

?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">

  <head><script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
  </head>

<body>

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
                  <a class="nav-link btn btn-outline-light" href="#">Carrinho</a>
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

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">

          <p class="lead text-muted">Faça seu login para acessar o sistema.</p>
          <form action="logar.php" method="POST" class="login-form">
            
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu E-mail" required>
            </div>
            <div class="mb-3">
              <label for="senha" class="form-label">Senha:</label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua Senha" required>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
            </div>
            <div>
              <p class="text-muted">Não possui cadastro? <a href="cadastrousuario.php">Cadastre-se</a></p>
            </div>
            <?php if(isset($error)){ echo "<p class='error'>$error</p>"; } ?>

          </form>
        </div>  
      </div>
    </section>

</main>

</body>
</html>