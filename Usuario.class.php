<?php

require 'src/conexao-bd.php';

class Usuario{

    private $nome;
    private $email;
    private $id;

    public function login($login, $senha){

        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $login);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql -> rowCount() > 0){
            
            $dado = $sql->fetch();
            
            $_SESSION['idusuario'] = $dado['idusuario'];
            $_SESSION['gerente'] = $dado['gerente'];

            return array('success' => true, 'message' => 'Login realizado com sucesso.');

        }else{

            return array('success' => false, 'message' => 'Usuário ou senha incorretos.');
        }
    }

    public function isgerente(){

        if(isset($_SESSION['gerente']) && $_SESSION['gerente'] == 1){
        
            return true;
        } else {
        
            return false;
        }
    }

    public static function buscarPorId($id) {
        $pdo = new PDO("mysql:host=localhost;dbname=cantodaspalavras", "root", "");
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :idusuario");
        $stmt->bindParam(':idusuario', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        $usuario = new Usuario();
        $usuario->setId($dados['idusuario']);
        $usuario->setNome($dados['nomeusuario']);
        $usuario->setEmail($dados['email']);

        return $usuario;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function cadastrarUsuario($nome, $email, $senha) {
        global $pdo;

        $sql = "INSERT INTO usuarios (nomeusuario, email, senha) VALUES (:nome, :email, :senha)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("nome", $nome);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        $idNovoUsuario = $pdo->lastInsertId();
        $this->criarCarrinho($idNovoUsuario);

        return array('success' => true, 'message' => 'Usuário cadastrado com sucesso.');
    }

    private function criarCarrinho($idUsuario) {
        
        global $pdo;

        $sql = "INSERT INTO carrinho (idusuario) VALUES (:idusuario)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idusuario", $idUsuario);
        $sql->execute();
    }


}

?>