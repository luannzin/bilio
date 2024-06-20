<?php
require_once "views/components/menu.php";
?>

<div class="container-login">
  <h2>Criar conta</h2>
  <form action="index.php?controle=usuariosController&metodo=criarConta" method="POST">
    <input type="text" placeholder="nome" name="nome" required>
    <input type="email" placeholder="email" name="email" required>
    <input type="password" placeholder="senha" name="senha" required>
    <button type="submit">Criar</button>
  </form>
  <a href="index.php?controle=usuariosController&metodo=login">Ja tem uma conta ? Logar</a>
</div>
