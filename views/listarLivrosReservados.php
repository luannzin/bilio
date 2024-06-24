<?php
require_once "views/components/menu.php";

?>


<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
    <div class="w-[600px] flex flex-col items-center justify-center gap-8">
        <span class="text-2xl"><strong>Lista de livros reservados</strong></span>
        <table class='p-2 border border-orange-900 w-full' border="1">
            <tr class='p-2 border border-orange-900'>
                <th hidden class='p-2 border border-orange-900 text-start'>ID</th>
                <th class='p-2 border border-orange-900 text-start'>Título</th>
                <th class='p-2 border border-orange-900 text-start'>Reservado por</th>
            </tr>
            <?php
            foreach ($todosLivros as $dado) {
                echo "
        <tr class='odd:bg-orange-50 even:bg-orange-200 p-2 border border-orange-900 max-w-[600px]'>
          <td hidden class='p-2 border border-orange-900'>{$dado->id_livro}</td>
          <td class='p-2 border border-orange-900'>{$dado->titulo}</td>
          <td class='p-2 border border-orange-900'>{$dado->usuarios}</td>
        </tr>";
            }
            ?>
        </table>
    </div>
</div>