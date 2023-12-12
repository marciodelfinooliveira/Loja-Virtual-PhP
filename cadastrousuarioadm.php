<?php

require_once('src/conexao-bd.php');

if(isset($_SESSION['login_error'])){
  
  $error = $_SESSION['login_error'];
  unset($_SESSION['login_error']);

}
if (session_status() == PHP_SESSION_NONE) {
  session_start();
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
      <a href="" class="navbar-brand d-flex align-items-center">
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
            <a class="nav-link btn btn-outline-light" href="cadastrolivro.php">Adicionar livro</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link btn btn-outline-light" href="cadastrousuarioadm.php">Adicionar Usuário</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-outline-light" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-outline-light" href="admin.php">Gerênciamento da Loja</a>
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
      <div class="row py-lg-3">
        <div class="col-lg-6 col-md-5 mx-auto">

          <p class="lead ">Cadastre Usuario</p>
          <form action="cadastrousuarioadmbd.php" method="POST" class="login-form">
            <div class="mb-3">
              <label for="nomeusuario" class="form-label">Nome</label>
              <input type="text" name="nomeusuario" id="nomeusuario" class="form-control" placeholder="Digite o nome" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Digite o E-mail" required>
            </div>
            <div class="mb-3">
              <label for="senha" class="form-label">Senha:</label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a Senha" required>
            </div>
            
            <div>
            </div>
            
            
            <div class="mb-3">
            <label for="gerente" class="form-label">Tipo de Usuário:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gerente" id="gerente" value="1">
                <label class="form-check-label" for="gerente">Gerente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gerente" id="gerente" value="0" checked>
                <label class="form-check-label" for="gerente">Cliente</label>
            </div>

            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
            </div>
        



          </form>
            
            
        
        </div>  
      </div>
    </section>

</main>

</body>
</html>