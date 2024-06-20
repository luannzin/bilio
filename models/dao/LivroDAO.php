<?php
require_once "models/Conexao.php";
require_once 'models/SessionControll.php';

class LivroDAO
{

  public function __construct(private $conexao)
  {
  }


  public function buscarUmLivro($livro)
  {
    try {
      $sql = "SELECT * FROM livros WHERE id_livro = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $livro->getIdLivro());
      $stm->execute();
      // $this->conexao = null;
      return $stm->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function getLivroPerId($id)
  {
    try {
      $sql = "SELECT * FROM livros WHERE id_livro = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $id);
      $stm->execute();
      // return $stm->fetchAll(PDO::FETCH_OBJ);
      return $stm->fetch();

    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function buscarTodosLivros()
  {
    try {
      $sql = "SELECT * FROM livros";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }

  public function adicionarLivro(Livro $data, $autores, $generos, $img){
    try {
      $sql = "INSERT INTO livros (titulo, descritivo, imagem) VALUES (?, ?, ?)";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $data->getTitulo());
      $stm->bindValue(2, $data->getDescritivo());
      $stm->bindValue(3, $img);
      $stm->execute();
      $livro_id = $this->conexao->lastInsertId();

      //inserindo no banco N-N autores_livros
      $sql = "INSERT INTO autores_livros (autor_id, livro_id) VALUES ";

       $values = [];
       foreach ($autores as $autor) {
         $values[] = '(?,?)';
       }

       $sql .= implode(',', $values);

      // // segue o fluxo de execução de query
       $stm = $this->conexao->prepare($sql);
       foreach ($autores as $i => $autor) {
         $stm->bindValue(($i * 2) + 1, $autor);
         $stm->bindValue((($i * 2) + 2), $livro_id);
       }
       $stm->execute();

       //inserindo no banco N-N generos_livros
      $sql = "INSERT INTO generos_livros (genero_id, livro_id) VALUES ";

      $values = [];
      foreach ($generos as $genero) {
        $values[] = '(?,?)';
      }

      $sql .= implode(',', $values);


     // // segue o fluxo de execução de query
      $stm = $this->conexao->prepare($sql);
      foreach ($generos as $i => $genero) {
        $stm->bindValue(($i * 2) + 1, $genero);
        $stm->bindValue((($i * 2) + 2), $livro_id);
      }
      $stm->execute();

    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function excluirLivro($id_genero, $id_autor, $id_livro){
    try{
      $sql = "DELETE generos
              FROM generos_livros generos
                INNER JOIN livros ON livros.id_livro = generos.livro_id
              WHERE livros.id_livro = ?";
      $stm = $this->conexao->prepare($sql);
      $stm->bindValue(1, $id_genero->getIdGenero());
      $stm->execute();

      $sql2 = "DELETE autores
              FROM autores_livros autores
                INNER JOIN livros ON livros.id_livro = autores.livro_id
              WHERE livros.id_livro = ?";
      $stm = $this->conexao->prepare($sql2);
      $stm->bindValue(1, $id_autor->getIdAutor());
      $stm->execute();

      $sql3 = "DELETE FROM livros WHERE id_livro = ?";
      $stm = $this->conexao->prepare($sql3);
      $stm->bindValue(1, $id_livro->getIdLivro());
      $stm->execute();
      return "Deletado com sucesso";
    }catch (PDOException $e) {
      echo $e->getMessage();
      // header('location:index.php');
    }
  }

  public function listarLivrosNome(){
    try {
      $sql = "SELECT livros.*, GROUP_CONCAT(DISTINCT autores.nome) autores, GROUP_CONCAT(DISTINCT generos.descritivo) generos
      FROM livros
        INNER JOIN autores_livros ON autores_livros.livro_id = livros.id_livro
          INNER JOIN autores ON autores.id_autor = autores_livros.autor_id
          INNER JOIN generos_livros ON generos_livros.livro_id = livros.id_livro
          INNER JOIN generos ON generos.id_genero = generos_livros.genero_id
      GROUP BY livros.id_livro ORDER BY livros.titulo";
      $stm = $this->conexao->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();
      header('location:index.php');
    }
  }
}
?>
