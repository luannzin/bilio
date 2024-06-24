<?php

require_once "models/Conexao.php";
require_once "models/dao/LivroDAO.php";
require_once "models/Livro.class.php";

class inicioController
{

  private $conn;
  public function __construct()
  {
    $this->conn = Conexao::getInstancia();
  }
  public function inicio()
  {
    require_once "views/home.php";
  }
}
