<?php
require_once "views/components/menu.php";
// var_dump($data);
?>

<div class="flex flex-col w-screen">
  <div class=" flex items-center justify-center flex-col mt-32">
    <img class="z-10 shadow-lg shadow-zinc-500 w-56 h-72" src="<?= $data['imagem'] ?>" alt="Imagem">

    <h1 class="text-xl my-6 font-bold">
      <?= $data['titulo'] ?>
    </h1>
    <p class="text-slate-500">
      <?= $data['descritivo'] ?>
    </p>
    <p>

    </p>
  </div>

</div>

<!-- <style>
  /* Estilos CSS */
  .container {
    text-align: center;
    /* margin-left: 1%; */
    width: 100vw;
    display: flex;
  }

  img {
    width: 200px;
    height: auto;
    margin-top: 62px;
  }

  h1 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
  }

  p {
    color: #777;
    font-size: 16px;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    margin-top: 16px;
    margin-right: 10px;
  }

  .blue {
    background-color: blue;
  }

  .danger {
    background-color: tomato;
  }
</style> -->
