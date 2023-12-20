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

          <div class="mb-3">
            <label for="gerente" class="form-label">Tipo de Usuário:</label>
          </div>

          <div class="form-check">
              <input class="form-check-input" type="radio" name="gerente" id="gerente" value="1">
              <label class="form-check-label" for="gerente">Gerente</label>
          </div>

          <div class="form-check">
              <input class="form-check-input" type="radio" name="gerente" id="gerente" value="0" checked>
              <label class="form-check-label" for="gerente">Cliente</label>
          </div>

          <div class="mb-3">
              <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
          </div>
      
        </form>
      </div>  
    </div>
  </section>

</main>

<?php include 'shared/footer.php'; ?>
