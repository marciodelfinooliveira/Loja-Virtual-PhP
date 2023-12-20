<?php

require_once('../src/conexao-bd.php');

if(isset($_SESSION['login_error'])){
  
  $error = $_SESSION['login_error'];
  unset($_SESSION['login_error']);

}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<?php include '../shared/header.php'; ?>

<main>

  <section>

    <div class="container">
      
      <br>
      <h2>Adicionar Livro</h2>

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

  </section>

</main>

<?php include '../shared/footer.php'; ?>
