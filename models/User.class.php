<?php

  class User
  {
    public function __construct(private int $id_usuario = 0, private string $nome = "",private $email = "", private string $senha = ""){}

    public function getIdUsuario()
    {
      return $this->id_usuario;
    }
    public function getNome()
    {
      return $this->nome;
    }

    public function getEmail()
    {
      return $this->email;
    }

    public function getSenha()
    {
      return $this->senha;
    }



  }
?>
