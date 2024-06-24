<?php
require_once "views/components/menu.php";

?>


<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Lista de gêneros</strong></span>
    <table class='p-2 border border-orange-900 w-full' border="1">
      <tr class='p-2 border border-orange-900'>
        <th class='p-2 border border-orange-900 w-3/4 text-start'>Nome</th>
        <th class='p-2 border border-orange-900 w-1/4 text-start'>Ações</th>
      </tr>
      <?php
      foreach ($allGeneros as $dado) {
        echo "<tr class='odd:bg-orange-50 even:bg-orange-200 p-2 border border-orange-900'>
              <td class='p-2 border border-orange-900'>{$dado->descritivo}</td>
              <td class='p-2 border border-orange-900'><a href='?controle=generosController&metodo=alterarGenero&id={$dado->id_genero}'>Alterar</a>
              ";
        if ($dado->livros > 0) {
          echo "</td>";
        } else {
          echo "
                &nbsp;&nbsp<a href='?controle=generosController&metodo=excluirGenero&id={$dado->id_genero}'>Excluir</a></td>
                </tr>";
        }
      }
      ?>
    </table>
    <a href="?controle=generosController&metodo=adicionarGenero">Adicionar novo Genero</a>
  </div>
</div>