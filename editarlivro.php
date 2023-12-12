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
                    <a class="nav-link btn btn-outline-light" href="cadastrousuarioadm.php">Adicionar Usuário</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light" href="cadastrolivro.php">Adicionar livro</a>
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