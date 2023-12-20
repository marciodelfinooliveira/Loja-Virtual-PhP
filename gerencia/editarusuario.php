<?php

require_once('../src/conexao-bd.php');

if (isset($_GET['id'])) {
    $iddousuario = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :id");
    $stmt->bindParam(':id', $iddousuario);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {

    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não fornecido.";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  
?>
  
<?php include '../shared/header.php'; ?>

<main>

    <section class="py-5 text-center container">

        <div class="row py-lg-3">

        <div class="col-lg-6 col-md-5 mx-auto">

            <p class="lead ">Editar usuário</p>

            <form action="editarusuariobd.php?id=<?= $usuario['idusuario']; ?>" method="POST" class="login-form">

            <div class="mb-3">
                <label for="nomeusuario" class="form-label">Nome</label>
                <input type="text" name="nomeusuario"  class="form-control" value="<?= $usuario['nomeusuario']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $usuario['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha"  class="form-control" value="<?= $usuario['senha']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="gerente" class="form-label">Tipo de Usuário:</label>
            </div>

            <?php 
            if ($usuario['gerente'] == 1){
                echo '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gerente" id="gerente" value="1" checked>
                    <label class="form-check-label" for="gerente">Gerente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gerente" id="gerente" value="0" >
                    <label class="form-check-label" for="gerente">Cliente</label>
                </div>';
            }else{
                echo '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gerente" id="gerente" value="1">
                    <label class="form-check-label" for="gerente">Gerente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gerente" id="gerente" value="0" checked>
                    <label class="form-check-label" for="gerente">Cliente</label>
                </div>';
            }
            ?>
                
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm">Confirmar</button>
            </div>

            <?php if(isset($error)){ echo "<p class='error'>$error</p>"; } ?>

            </form>

        </div>  

    </section>

</main>

<?php include '../shared/footer.php'; ?>