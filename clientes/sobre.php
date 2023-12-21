<?php

require_once('../src/conexao-bd.php');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<?php include '../shared/header.php'; ?>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h2 class="fw-light">Canto das Palavras</h2>
        <p class="lead text-body-secondary">Bem-vindo ao Canto das Palavras, onde a magia da leitura ganha vida! Explorar as páginas de um livro 
          é como embarcar em uma jornada única, uma aventura que transcende fronteiras e desafia a imaginação. Na nossa livraria online, convidamos 
          você a descobrir mundos fascinantes, encontrar personagens inesquecíveis e mergulhar em histórias que aquecem o coração. Navegue pela 
          nossa seleção cuidadosamente curada, escolha os livros que despertam sua curiosidade, e deixe-se encantar pelo prazer de ler. Com alguns 
          cliques, você pode levar para casa os tesouros literários que tornarão cada momento uma celebração da magia das palavras. Explore o Canto 
          das Palavras e descubra o poder transformador dos livros, onde a diversão e a inspiração aguardam por você!</p>
        <p>
        </p>
      </div>
    </div>
  </section>

</main>

<?php include '../shared/footer.php'; ?>