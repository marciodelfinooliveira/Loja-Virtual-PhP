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
        <p class="lead ">Envie suas dúvidas ou reclamações</p>

        <form action="contatobd.php" method="POST" class="login-form">

          <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="10" placeholder="Digite sua Mensagem" required></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Envio</button>
          </div>

          <?php if(isset($error)){ echo "<p class='error'>$error</p>"; } ?>

        </form>
      </div>  
    </div>
  </section>
 
</main>

<?php include 'shared/footer.php'; ?>
