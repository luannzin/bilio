<?php
require_once "views/components/menu.php";
?>


<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Entre usando a sua conta Bilio!</strong></span>
    <form class="w-full flex flex-col gap-4" action="index.php?controle=usuariosController&metodo=login" method="post">
      <div class="flex flex-col w-full gap-4">
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="email" placeholder="Email" name="email" required>
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="password" placeholder="Senha" name="senha" required>
      </div>
      <?php if($msg != ''){echo $msg;} ?>
      <button class="w-full bg-orange-900 text-orange-50 py-4 rounded-lg" type="submit">Entrar</button>
    </form>

    <a href="index.php?controle=usuariosController&metodo=criarConta">Não tem uma conta? <span>Crie uma agora</span></a>
  </div>
</div>