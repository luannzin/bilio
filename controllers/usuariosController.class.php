<?php
require_once "models/Conexao.php";
require_once "models/dao/UserDAO.php";
require_once "models/User.class.php";

class UsuariosController
{
  private $conn;
  public function __construct()
  {
    $this->conn = Conexao::getInstancia();
  }
  public function login()
  {
    $msg = '';
    if (isset($_SESSION) && isset($_SESSION['id_usuario'])) {
      header('location:index.php?controle=inicioController&metodo=inicio');
    }

    $email = filter_input(INPUT_POST, 'email');
    $senha = md5(filter_input(INPUT_POST, 'senha'));
    if (isset($senha, $email)) {
      $userModel = new User(email: $_POST['email'], senha: md5($_POST['senha']));
      $userDao = new UserDAO($this->conn);
      $result = $userDao->verifyExistAccount($userModel);

      if (is_array($result) && count($result) > 0) {
        $userDao->logar($userModel);
      } else {
        $msg = "Login ou senha incorretos.";
      }
    }
    require_once "views/login.php";
  }

  public function deslogar()
  {
    try {
      $SessionControl = new SessionControl();
      $SessionControl->destroy();
    } catch (Exception $err) {
      $err->getMessage();
    }
  }
  public function criarConta()
  {
    try {

      if (isset($_SESSION) && isset($_SESSION['id_usuario'])) {
        header('location:index.php?controle=inicioController&metodo=inicio');
      }

      $nome = filter_input(INPUT_POST, 'nome');
      $email = filter_input(INPUT_POST, 'email');
      $senha = md5(filter_input(INPUT_POST, 'senha'));

      if (isset($nome) && isset($email) && isset($senha)) {
        $userModel = new User(nome: $_POST['nome'], email: $_POST['email'], senha: md5($_POST['senha']));
        $userDao = new UserDAO($this->conn);

        $result = $userDao->verifyEmailExist($userModel);
        if (!$result) {
          $userDao->criarConta($userModel);
          return;
        } else {
          header('location:index.php?controle=inicioController&metodo=inicio');
        }
      }
      require_once "views/criarConta.php";
    } catch (Exception $e) {
      $e->getMessage();
    }
  }
}
