<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'src/conexao-bd.php';
    require 'Usuario.class.php';

    $u = new Usuario();    
    $login = addslashes($_POST['email']);   
    $senha = addslashes($_POST['senha']);
    
    $result = $u->login($login, $senha);
    
    if ($result['success']){
    
        if(isset($_SESSION['idusuario'])){
    
            if($u->isgerente()){
                
                $_SESSION['login_success'] = "Bem Vindo !!";
                header("Location: admin.php");
            } else {

                $_SESSION['login_success'] = "Bem Vindo !!";
                header("Location: index.php");
            }
        }else{

            $_SESSION['login_error'] = "Usuário ou senha incorretos.";
            header("Location: login.php");
        }  
    } else {
        
        $_SESSION['login_error'] = $result['message'];
        $_SESSION['login_form_data'] = $_POST;
        
        $_SESSION['login_error'] = "Usuário ou senha incorretos.";
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}
?>
