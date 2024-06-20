<?php
  require_once "views/components/menu.php";

?>

<div class='container flex items-center justify-center flex-col'>
  <h1 class="mt-16 text-xl font-bold my-3" >Lista de generos</h1>

  <table class='p-2 border-solid border-2 border-sky-500' border="1">
    <tr class='p-2 border-solid border-2 border-sky-500'>
      <th class='p-2 border-solid border-2 border-sky-500'>Descritivo</th>
      <th class='p-2 border-solid border-2 border-sky-500'>Ações</th>
    </tr>
    <?php
    foreach ($allGeneros as $dado) {
      echo "<tr class='odd:bg-white even:bg-slate-300 p-2 border-solid border-2 border-sky-500'>
              <td class='p-2 border-solid border-2 border-sky-500'>{$dado->descritivo}</td>
              <td class='p-2 border-solid border-2 border-sky-500'><a href='?controle=generosController&metodo=alterarGenero&id={$dado->id_genero}'>Alterar</a>
              "; if($dado->livros > 0){
                echo "</td>";
              }
              else{ echo "
                &nbsp;&nbsp<a href='?controle=generosController&metodo=excluirGenero&id={$dado->id_genero}'>Excluir</a></td>
                </tr>";
              }
    }
    ?>
  </table>
  <br>
  <a href="?controle=generosController&metodo=adicionarGenero">Inserir novo Genero</a>

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
