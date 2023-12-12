<?php
require_once('src/conexao-bd.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
unset($_SESSION['idusuario']);
session_destroy();
echo ('Usuario Deslogado');
header("Location: login.php");

?>