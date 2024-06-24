<?php
require_once "views/components/menu.php";
?>

<div class="text-orange-900 flex justify-center">
  <div class="max-w-[1200px] flex items-center justify-center flex-col mt-16 gap-4">
    <h1 class="text-3xl">
      <strong><?= $data['titulo'] ?></strong>
    </h1>
    <img class="max-w-[30vw] w-full rounded-2xl" src='<?= $data['imagem'] ?>' alt="Imagem">
    <span class="max-w-[30vw] w-full">
      <?= $data['descritivo'] ?>
    </span>
  </div>

</div>