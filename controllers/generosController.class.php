<?php

require_once "models/Conexao.php";

require_once "models/dao/GeneroDAO.php";
require_once "models/Genero.class.php";


class GenerosController
{

  private $conn;
  public function __construct()
  {
    $this->conn = Conexao::getInstancia();
  }

  public function adicionarGenero()
  {
    if ($_SESSION['adm'] === 'true') {
      require_once "views/adicionarGenero.php";
      if ($_POST) {
        $descritivo = filter_input(INPUT_POST, 'descritivo');
        $dataModel = new Genero(descritivo: $_POST['descritivo']);
        if (isset($descritivo)) {
          $generoDAO = new GeneroDAO($this->conn);
          $generoDAO->criarGenero($dataModel);

          header('location:index.php?controle=generosController&metodo=listarGeneros');
        }
      }
    } else {
      header('Location: index.php');
    }
  }

  public function listarGeneros()
  {
    if ($_SESSION['adm'] === 'true') {
      $generoDAO = new GeneroDAO($this->conn);
      $allGeneros = $generoDAO->getAllGeneros();
      require_once "views/listarGeneros.php";
    } else {
      header('Location: index.php');
    }
  }

  public function alterarGenero()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET["id"])) {
        $dataModel = new Genero($_GET["id"]);
        $generoDAO = new GeneroDAO($this->conn);
        $data = $generoDAO->buscarUmGenero($dataModel);
        require_once "views/alterarGenero.php";

        if ($_POST) {
          $genero = new Genero(id_genero: $_POST['id_genero'], descritivo: $_POST['descritivo']);
          $generoDAO->atualizarGenero($genero);
          header("location:index.php?controle=generosController&metodo=listarGeneros");
        }
      }
    } else {
      header('Location: index.php');
    }
  }

  public function excluirGenero()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET["id"])) {
        $genero = new Genero($_GET["id"]);
        $generoDAO = new GeneroDAO($this->conn);
        $generoDAO->excluirGenero($genero);
        header("location:index.php?controle=generosController&metodo=listarGeneros");
      }
    } else {
      header('Location: index.php');
    }
  }
}
