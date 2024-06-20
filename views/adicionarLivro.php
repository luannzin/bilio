<?php
require_once "views/components/menu.php";
?>

<?php ob_start(); ?>
<div class="container">
  <h2 class=" mt-16 text-xl font-bold my-3">Adicionar livros</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titulo">Título:</label>
      <input type="text" id="titulo" name="titulo">
    </div>

    <div class="form-group">
      <label for="descritivo">Descritivo:</label>
      <textarea id="descritivo" name="descritivo"></textarea>
    </div>
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" id="image" name="image">
    </div>
    <div class="form-group">
      <label for="idAutor">Autor(a):</label>
      <?php foreach ($dataAutor as $autores) {
        echo '<input class="ml-3 mr-1"  type="checkbox" name="autor[]" value=' . $autores->id_autor . '/>' . $autores->nome;
      }
      ?>
      <!-- <option value="1">ação</option> -->
    </div>
    <div class="form-group">
      <label for="idGenero"> Gênero:</label>
      <?php foreach ($dataGenero as $generos) {
        echo '<input class="ml-3 mr-1" type="checkbox" name="genero[]" value=' . $generos->id_genero . '>' . $generos->descritivo;
      } ?>
    </div>
    <input type="submit" value="Adicionar">
  </form>
</div>


<style>
  .container {
    width: 400px;
    margin: 0 auto;
  }

  select {
    width: 100%
  }

  h2 {
    text-align: center;
  }

  .form-group {
    margin-bottom: 10px;
  }

  label {
    display: block;
    font-weight: bold;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
  }

  input[type="file"] {
    width: 100%;
    padding: 5px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
