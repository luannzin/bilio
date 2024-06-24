<?php
require_once "views/components/menu.php";

?>

<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Lista de autores</strong></span>
    <table class='p-2 border border-orange-900 w-full' border="1">
      <tr class='p-2 border border-orange-900'>
        <th class='p-2 border border-orange-900 w-3/4 text-start'>Nome</th>
        <th class='p-2 border border-orange-900 w-1/4 text-start'>Ações</th>
      </tr>
      <?php
      foreach ($allAutores as $dado) {
        echo "<tr class='odd:bg-orange-50 even:bg-orange-200 p-2 border border-orange-900'>
              <td class='p-2 border border-orange-900'>{$dado->nome}</td>
              <td class='p-2 border border-orange-900'><a href='?controle=autoresController&metodo=alterarAutor&id={$dado->id_autor}'>Alterar</a>
              ";
        if ($dado->livros > 0) {
          echo "</td>";
        } else {
          echo "
                &nbsp;&nbsp<a href='?controle=autoresController&metodo=excluirAutor&id={$dado->id_autor}'>Excluir</a></td>
                </tr>";
        }
      }
      ?>
    </table>
    <a href="?controle=autoresController&metodo=adicionarAutor">Adicionar novo Autor</a>
  </div>
</div>