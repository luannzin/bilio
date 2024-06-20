<?php
require_once "views/components/menu.php";

?>
<div class='container flex items-center justify-center flex-col'>
  <h1 class="mt-16 text-xl font-bold my-3" >Lista de livros</h1>

  <table border="1">
    <tr class="p-2 border-solid border-2 border-sky-500">
      <th hidden class="p-2 border-solid border-2 border-sky-500">ID</th>
      <th class="p-2 border-solid border-2 border-sky-500">Título</th>
      <th class="p-2 border-solid border-2 border-sky-500">Descrição</th>
      <th class="p-2 border-solid border-2 border-sky-500">Autor(a)</th>
      <th class="p-2 border-solid border-2 border-sky-500">Genero(s)</th>
      <th class="p-2 border-solid border-2 border-sky-500">Imagem</th>
      <th colspan='2'>Ações</th>
    </tr>
    <?php
    foreach ($todosLivros as $dado) {
      echo "<tr class='odd:bg-white even:bg-slate-300 p-2 border-solid border-2 border-sky-500'>
              <td hidden class='p-2 border-solid border-2 border-sky-500'>{$dado->id_livro}</td>
              <td class='p-2 border-solid border-2 border-sky-500'>{$dado->titulo}</td>
              <td class='p-2 border-solid border-2 border-sky-500'>{$dado->descritivo}</td>
              <td class='p-2 border-solid border-2 border-sky-500'>{$dado->autores}</td>
              <td class='p-2 border-solid border-2 border-sky-500'>{$dado->generos}</td>
              <td class='p-2 border-solid border-2 border-sky-500'><img src='{$dado->imagem}' height='78px' width='78px'></td>
              <td class='p-2 border-solid border-2 border-sky-500'><a href='?controle=livrosController&metodo=alterarLivro&id={$dado->id_livro}'>Alterar</a></td>
              <td class='p-2 border-solid border-2 border-sky-500'><a href='?controle=livrosController&metodo=excluirLivro&id={$dado->id_livro}'>Excluir</a></td>
            </tr>";
    }
    ?>
  </table>
  <br>
  <a href="?controle=livrosController&metodo=adicionarLivro">Inserir novo Livro</a>

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
