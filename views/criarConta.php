<?php
require_once "views/components/menu.php";
?>

<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Crie uma conta Bilio!</strong></span>
    <form class="w-full flex flex-col gap-4" action="index.php?controle=usuariosController&metodo=criarConta" method="post">
      <div class="flex flex-col w-full gap-4">
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="text" placeholder="Nome" name="nome" required>
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="email" placeholder="Email" name="email" required>
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="password" placeholder="Senha" name="senha" required>
      </div>
      <button class="w-full bg-orange-900 text-orange-50 py-4 rounded-lg" type="submit">Criar conta</button>
    </form>
    <a href="index.php?controle=usuariosController&metodo=login">Já tem uma conta? <span>Faça o login</span></a>
  </div>
</div>