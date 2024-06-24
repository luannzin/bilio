<?php
require_once "views/components/menu.php";
?>

<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Alterar autor</strong></span>
    <form method="post" class="w-full flex flex-col gap-4">
      <input type="hidden" name="id_autor" value="<?php echo $data[0]->id_autor; ?>" />
      <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="text" placeholder="Nome" name="nome" required value="<?php echo $data[0]->nome; ?>" />
      <button class="w-full bg-orange-900 text-orange-50 py-4 rounded-lg" type="submit" value="Adicionar">Alterar</button>
    </form>
  </div>
</div>