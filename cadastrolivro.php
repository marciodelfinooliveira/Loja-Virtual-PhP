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


    </style>
</head>
<body>
    <div class="container">
        <br><h2>Adicionar Livro</h2>
        <form action="cadastrolivrobd.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nomelivro" class="form-label">Nome do Livro:</label>
              <input type="text" name="nomelivro" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="nomeautor" class="form-label">Nome do Autor:</label>
              <input type="text" name="nomeautor" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição:</label>
              <textarea name="descricao" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
              <label for="preco" class="form-label">Preço:</label>
              <input type="number" name="preco" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="tema" class="form-label">Tema:</label>
              <input type="text" name="tema" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="imagem" class="form-label">Capa do Livro:</label>
              <input type="file" name="imagem" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
              <input type="submit" value="Adicionar Livro" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
        

    

</form>

          </form>
        </div>  
      </div>
    </section>

</main>

</body>
</html>