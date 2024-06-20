<?php

require_once "models/Conexao.php";
require_once "models/dao/AutorDAO.php";
require_once "models/Autor.class.php";

class AutoresController
{
  private $conn;
  public function __construct()
  {
    $this->conn = Conexao::getInstancia();
  }

  public function listarAutores()
  {
    if ($_SESSION['adm'] === 'true') {
      $AutorDAO = new AutorDAO($this->conn);
      $allAutores = $AutorDAO->getAllAutores();
      require_once "views/listarAutores.php";
    } else {
      header('Location: index.php');
    }

  }

  public function adicionarAutor()
  {
    if ($_SESSION['adm'] === 'true') {
      if ($_POST) {
        $nome = filter_input(INPUT_POST, 'nome');
        $dataModel = new Autor(nome: $_POST['nome']);
        if (isset($nome)) {
          $AutorDAO = new AutorDAO($this->conn);
          $AutorDAO->criarAutor($dataModel);
          header('location:index.php?controle=autoresController&metodo=listarAutores');
        }
      }
      require_once "views/adicionarAutor.php";
    } else {
      header('Location: index.php');
    }
  }

  public function alterarAutor()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET["id"])) {
        $dataModel = new Autor($_GET["id"]);
        $AutorDAO = new AutorDAO($this->conn);
        $data = $AutorDAO->buscarUmAutor($dataModel);
        require_once "views/alterarAutor.php";

        if ($_POST) {
          $autor = new Autor(id_autor: $_POST['id_autor'], nome: $_POST['nome']);
          $AutorDAO->atualizarAutor($autor);
          header("location:index.php?controle=autoresController&metodo=listarAutores");
        }
      }
    } else {
      header('Location: index.php');
    }
  }

  public function excluirAutor()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET["id"])) {
        $autor = new Autor($_GET["id"]);
        $AutorDAO = new AutorDAO($this->conn);
        $AutorDAO->excluirAutor($autor);
        header("location:index.php?controle=autoresController&metodo=listarAutores");
      }
    }
    else {
      header('Location: index.php');
    }
  }
}
