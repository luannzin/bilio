<?php
require_once "models/Conexao.php";
require_once 'models/SessionControll.php';

class AutorDAO
{

  public function __construct(private $conexao)
  {
  }

  public function selectAutores()
  {
    try {
      $sql= "SELECT GROUP_CONCAT(DISTINCT autores.nome) nome, autores.id_autor, GROUP_CONCAT(autLivros.livro_id) livro_id
              FROM autores
                LEFT JOIN autores_livros autLivros ON autLivros.autor_id = autores.id_autor
            group by autores.id_autor";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();

    }
  }

  public function getAllAutores()
  {
    try {
      $sql = "SELECT autores.*, COUNT(autores_livros.id) livros
      FROM autores
        LEFT JOIN autores_livros ON autores_livros.autor_id = autores.id_autor
      GROUP BY autores.id_autor;";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function criarAutor(Autor $data)
  {
    try {
      $sql = "INSERT INTO autores (nome) VALUES (?)";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $data->getNome());
      $stm->execute();

    } catch (PDOException $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function getAutorPerId($id)
  {
    try {
      $sql = "SELECT * FROM autores WHERE id_autor = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $id);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }
  public function buscarUmAutor($autor)
  {
    try {
      $sql = "SELECT * FROM autores WHERE id_autor = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $autor->getIdAutor());
      $stm->execute();
      // $this->conexao = null;
      return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function atualizarAutor($autor)
  {
    try {
      $sql = "UPDATE autores SET nome = ? WHERE id_autor = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $autor->getNome());
      $stm->bindValue(2, $autor->getIdAutor());
      $stm->execute();
      // $this->conexao = null;
      return "Alterado com sucesso";

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function excluirAutor($autor)
  {
    try {
      $sql = "DELETE FROM autores WHERE id_autor = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $autor->getIdAutor());
      $stm->execute();
      // $this->conexao = null;

      return "Deletado com sucesso";

    } catch (PDOException $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }


}
