<?php
require_once "models/Conexao.php";

require_once "models/dao/LivroDAO.php";
require_once "models/dao/GeneroDAO.php";
require_once "models/dao/AutorDAO.php";

require_once "models/Livro.class.php";
require_once "models/Genero.class.php";
require_once "models/Autor.class.php";

class livrosController
{
  private $conn;
  public function __construct()
  {
    $this->conn = Conexao::getInstancia();
  }

  public function listar()
  {
    if (isset($_SESSION['id_usuario'])) {
      require_once "views/components/menu.php";
      $livroDAO = new LivroDAO($this->conn);
      $data = $livroDAO->buscarTodosLivros();
      require_once "views/listarLivros.php";
    } else {
      header('Location: index.php');
    }
  }

  public function listarLivrosAG()
  {
    if ($_SESSION['adm'] === 'true') {
      $livroDAO = new LivroDAO($this->conn);
      $todosLivros = $livroDAO->listarLivrosNome();

      require_once "views/listarLivrosAG.php";
    } else {
      header('Location: index.php');
    }
  }

  public function listarLivrosReservados()
  {
    if ($_SESSION['adm'] === 'true') {
      $livroDAO = new LivroDAO($this->conn);
      $todosLivros = $livroDAO->listarLivrosReservados();

      require_once "views/listarLivrosReservados.php";
    } else if ($_SESSION['id_usuario']) {
      $livroDAO = new LivroDAO($this->conn);
      $todosLivros = $livroDAO->listarLivrosReservadosPorUsuario();

      require_once "views/listarLivrosReservados.php";
    } else {
      header('Location: index.php');
    }
  }

  public function reservarLivro()
  {
    $livroDAO = new LivroDAO($this->conn);
    $livroDAO->reservarLivro($_SESSION["id_usuario"], $_GET["id"]);
    require_once "views/reservarConfirmacao.php";
  }

  public function adicionarLivro()
  {
    if ($_SESSION['adm'] === 'true') {

      $generoDAO = new GeneroDAO($this->conn);
      $autorDAO = new AutorDAO($this->conn);
      $livroDAO = new LivroDAO($this->conn);
      $dataGenero = $generoDAO->getAllGeneros();
      $dataAutor = $autorDAO->getAllAutores();
      require_once "views/adicionarLivro.php";

      if ($_POST) {
        if (isset($dataGenero, $dataAutor)) {
          $titulo = filter_input(INPUT_POST, 'titulo');
          $descritivo = filter_input(INPUT_POST, 'descritivo');
          $genero = $_POST['genero'];
          $autor = $_POST['autor'];

          if (empty($genero) || empty($autor)) {
            header("Location: ?controle=livrosController&metodo=adicionarLivro");
            return;
          }
          if ($autor >= 0 && $genero >= 0 && $titulo != '' && $descritivo != '') {
            $livro = new Livro(titulo: $_POST['titulo'], descritivo: $_POST['descritivo'], autor: $autor, genero: $genero);

            if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
              $image = $_FILES["image"];
              $imageTypes = ["image/jpeg", "image/jpg", "image/png"]; // tipos permitidos de imagem
              $jpgArray = ["image/jpeg", "image/jpg"]; // mesma coisa da variavel do $imageType, diferença é que aqui é para validar se é jpg ou jpeg, sem contar a png
              if (in_array($image["type"], $imageTypes)) { // aqui vemos se existe uma chave chamada type no array, é tipo on operator 'in' no javascript

                $ext = strtolower(substr($_FILES['image']['name'], -4)); //Pegando extensão do arquivo
                $new_name = bin2hex(random_bytes(15)) . $ext; //Definindo um novo nome para o arquivo
                $dir = './assets/img/'; //Diretório para uploads
                move_uploaded_file($_FILES['image']['tmp_name'], $dir . $new_name);
                $pathToSave = $dir . $new_name;

                if ($genero) {
                  $livroDAO->adicionarLivro($livro, $autor, $genero, $pathToSave);
                }

                header("Location: ?controle=livrosController&metodo=listarLivrosAG");
              }
            } else {
              $livroDAO->adicionarLivro($livro, $autor, $genero, "./assets/img/defaultBook.jpg");
              header("Location: ?controle=livrosController&metodo=listarLivrosAG");
            }
          }
        }
      }
    } else {
      header('Location: index.php');
    }
  }

  public function excluirLivro()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET["id"])) {
        $id_genero = new Genero($_GET["id"]);
        $id_autor = new Autor($_GET["id"]);
        $id_livro = new Livro($_GET["id"]);
        $livroDAO = new LivroDAO($this->conn);
        $livroDAO->excluirLivro($id_genero, $id_autor, $id_livro);
        header("location:index.php?controle=livrosController&metodo=listarLivrosAG");
      }
    } else {
      header('Location: index.php');
    }
  }

  public function alterarLivro()
  {
    if ($_SESSION['adm'] === 'true') {
      if (isset($_GET['id'])) {
        $id_genero = new Genero($_GET["id"]);
        $id_autor = new Autor($_GET["id"]);
        $generoDAO = new GeneroDAO($this->conn);
        $autorDAO = new AutorDAO($this->conn);
        $id_livro = new Livro($_GET["id"]);
        $livro = new Livro($_GET["id"]);
        $livroDAO = new LivroDAO($this->conn);
        $dataGen = $generoDAO->selectGeneros();
        $dataAutor = $autorDAO->selectAutores();
        $data = $livroDAO->buscarUmLivro($livro);

        if ($_POST) {
          $titulo = filter_input(INPUT_POST, 'titulo');
          $descritivo = filter_input(INPUT_POST, 'descritivo');
          $genero = $_POST['genero'];
          $autor = $_POST['autor'];

          if (empty($genero) || empty($autor)) {
            header("Location: index.php?controle=livrosController&metodo=alterarLivro&id={$_GET['id']}");
            return;
          }
          if ($autor >= 0 && $genero >= 0 && $titulo != '' && $descritivo != '') {
            $livroDAO->excluirLivro($id_genero, $id_autor, $id_livro);
            $livro = new Livro(titulo: $_POST['titulo'], descritivo: $_POST['descritivo'], autor: $autor, genero: $genero);

            if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
              $image = $_FILES["image"];
              $imageTypes = ["image/jpeg", "image/jpg", "image/png"]; // tipos permitidos de imagem
              $jpgArray = ["image/jpeg", "image/jpg"]; // mesma coisa da variavel do $imageType, diferença é que aqui é para validar se é jpg ou jpeg, sem contar a png
              if (in_array($image["type"], $imageTypes)) { // aqui vemos se existe uma chave chamada type no array, é tipo on operator 'in' no javascript

                $ext = strtolower(substr($_FILES['image']['name'], -4)); //Pegando extensão do arquivo
                $new_name = bin2hex(random_bytes(15)) . $ext; //Definindo um novo nome para o arquivo
                $dir = './assets/img/'; //Diretório para uploads
                move_uploaded_file($_FILES['image']['tmp_name'], $dir . $new_name);
                $pathToSave = $dir . $new_name;

                if ($image) {
                  $livroDAO->adicionarLivro($livro, $autor, $genero, $pathToSave);
                }
                header("Location: ?controle=livrosController&metodo=listarLivrosAG");
              }
            } else {
              $livroDAO->adicionarLivro($livro, $autor, $genero, "./assets/img/defaultBook.jpg");
              header("Location: ?controle=livrosController&metodo=listarLivrosAG");
            }
          }
        }
      }
      require_once "views/alterarLivro.php";
    } else {
      header('Location: index.php');
    }
  }

  public function verLivro()
  {
    $livroDAO = new LivroDAO($this->conn);
    $data = $livroDAO->getLivroPerId($_GET['id']);
    $data['id'] = $_GET['id'];
    require_once "views/livroPorId.php";
  }
}
