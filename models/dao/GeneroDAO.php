<?php
require_once "models/Conexao.php";
require_once 'models/SessionControll.php';

class GeneroDAO
{

  public function __construct(private $conexao)
  {
  }


  public function getAllGeneros()
  {
    try {
      $sql = "SELECT generos.*, COUNT(generos_livros.id) livros
        FROM generos
        LEFT JOIN generos_livros ON generos_livros.genero_id = generos.id_genero
      GROUP BY generos.id_genero;";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function selectGeneros()
  {
    try {
      $sql= "SELECT GROUP_CONCAT(DISTINCT generos.descritivo) descritivo, generos.id_genero, GROUP_CONCAT(genLivros.livro_id) livro_id
              FROM generos
                LEFT JOIN generos_livros genLivros ON genLivros.genero_id = generos.id_genero
              GROUP BY generos.id_genero";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();

    }
  }


  public function getGeneroPerId($id)
  {
    try {
      $sql = "SELECT * FROM generos WHERE id_genero = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $id);
      $stm->execute();
      // $this->conexao = null;
      return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }
  public function buscarUmGenero($genero)
  {
    try {
      $sql = "SELECT * FROM generos WHERE id_genero = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $genero->getIdGenero());
      $stm->execute();
      // $this->conexao = null;
      return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function atualizarGenero($genero)
  {
    try {
      $sql = "UPDATE generos SET descritivo = ? WHERE id_genero = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $genero->getDescritivo());
      $stm->bindValue(2, $genero->getIdGenero());
      $stm->execute();
      // $this->conexao = null;
      return "Alterado com sucesso";

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function excluirGenero($genero)
  {
    try {
      $sql = "DELETE FROM generos WHERE id_genero = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $genero->getIdGenero());
      $stm->execute();
      // $this->conexao = null;

      return "Deletado com sucesso";

    } catch (PDOException $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function criarGenero(Genero $data)
  {
    try {
      $sql = "INSERT INTO generos (descritivo) VALUES (?)";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $data->getDescritivo());
      $stm->execute();

    } catch (PDOException $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

}
