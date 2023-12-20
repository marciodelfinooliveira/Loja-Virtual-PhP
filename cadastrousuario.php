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

<?php include 'shared/header.php'; ?>

<main>

  <section class="py-5 text-center container">

    <div class="row py-lg-3">

      <div class="col-lg-6 col-md-5 mx-auto">

        <p class="lead ">Faça seu  cadastro</p>

        <form action="cadastrousuariobd.php" method="POST" class="login-form">

          <div class="mb-3">
            <label for="nomeusuario" class="form-label">Nome</label>
            <input type="text" name="nomeusuario" id="nomeusuario" class="form-control" placeholder="Digite seu nome" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu E-mail" required>
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua Senha" required>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Cadastre-se</button>
          </div>

          <?php if(isset($error)){ echo "<p class='error'>$error</p>"; } ?>

        </form>

      </div>  

    </div>
    
  </section>

</main>

<?php include 'shared/footer.php'; ?>
