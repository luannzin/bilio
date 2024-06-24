<?php
if (!isset($_SESSION))
  session_start();

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Tangerine&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50">
  <header class="w-full flex justify-center">
    <nav class="flex min-h-20 h-fit w-[1200px] items-center justify-between text-orange-900">
      <div class="flex items-center gap-6">
        <a href="index.php?controle=inicioController&metodo=inicio">Início</a>
        <?= isset($_SESSION['id_usuario']) ? '
            <a href="index.php?controle=livrosController&metodo=listar">Coleção</a>
          ' : null ?>
        <?= isset($_SESSION['id_usuario']) && isset($_SESSION['adm']) && $_SESSION['adm'] === 'true' ? '
             <div class="flex flex-col gap-4 relative group">
              <span>Adicionar</span>
              <div class="flex flex-col gap-2 absolute py-8 invisible group-hover:visible hover:visible">
                  <a href="index.php?controle=livrosController&metodo=adicionarLivro">Livro</a>
                  <a href="index.php?controle=generosController&metodo=adicionarGenero">Gênero</a>
                  <a href="index.php?controle=autoresController&metodo=adicionarAutor">Autor</a>
              </div>
             </div>

             <div class="flex flex-col gap-4 relative group">
              <span>Tabela</span>
              <div class="flex flex-col gap-2 absolute py-8 invisible group-hover:visible hover:visible">
                <a href="index.php?controle=livrosController&metodo=listarLivrosAG">Livros</a>
                <a href="index.php?controle=generosController&metodo=listarGeneros">Gêneros</a>
                <a href="index.php?controle=autoresController&metodo=listarAutores">Autores</a>
              </div>
             </div>

             <a href="index.php?controle=livrosController&metodo=listarLivrosReservados">Reservados</a>
          ' : null ?>
      </div>
      <a href=<?= isset($_SESSION['id_usuario']) ? 'index.php?controle=usuariosController&metodo=deslogar' : 'index.php?controle=usuariosController&metodo=login' ?>>
        <?= isset($_SESSION['id_usuario']) ? 'Deslogar' : 'Login' ?>
      </a>
    </nav>
  </header>
</body>


<style>
  .dropdown {
    text-decoration: none;
    color: white;
    margin: 10px 0;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .dropdown a:hover {
    background-color: #555;
  }

  .dropdown-link {
    color: #333;
    text-decoration: none;
  }

  .dropdown-content {
    top: 40px;
    z-index: 10;
    display: none;
    position: absolute;
    background-color: gray;
    min-width: 150px;
    padding: 10px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    display: block;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>

</html>