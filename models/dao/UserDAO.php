<?php

require_once "models/Conexao.php";
require_once 'models/SessionControl.php';
class UserDAO
{

  public function __construct(private $conexao)
  {
  }

  public function logar(User $data)
  {
    try {
      $sql = "SELECT * FROM usuarios WHERE email = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $data->getEmail());
      $stm->execute();
      $result = $stm->fetch();

      // print_r($result);
      $SessionControl = new SessionControl();
      $SessionControl->constroy($result);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  public function criarConta(User $data)
  {
    try {
      $sql = "INSERT INTO usuarios (nome,email,senha,adm) VALUES (?, ?, ?, 'false')";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $data->getNome());
      $stm->bindValue(2, $data->getEmail());
      $stm->bindValue(3, $data->getSenha());
      $stm->execute();

      $sql2 = "SELECT * FROM usuarios WHERE email = ?";
      $stm2 = $this->conexao->prepare($sql2);
      $stm2->bindValue(1, $data->getEmail());
      $stm2->execute();
      $result = $stm2->fetch();

      $SessionControl = new SessionControl();
      $SessionControl->constroy($result);
    } catch (PDOException $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }


  public function verifyExistAccount(User $data)
  {
    if (isset($data)) {
      try {
        $sql = "SELECT id_usuario, email, senha FROM usuarios WHERE email = ? AND senha = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->bindValue(1, $data->getEmail());
        $stm->bindValue(2, $data->getSenha());
        $stm->execute();
        // $this->conexao = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (Exception $e) { {
          // header('location:index.php');
          return $e;
        }
      }
    }
  }
  public function verifyEmailExist(User $data)
  {
    if (isset($data)) {
      try {
        $sql = "SELECT email FROM usuarios WHERE email = ?";

        $stm = $this->conexao->prepare($sql);
        $stm->bindValue(1, $data->getEmail());
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (Exception $e) { {
          header('location:index.php');
          return "Problema ao verificar usuário pelo e-mail";
        }
      }
    }
  }
}
