<?php

require_once "views/components/menu.php";
?>

<div class="container-login">
  <h2>Logar</h2>
  <form action="index.php?controle=usuariosController&metodo=login" method="post">
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Senha" name="senha" required>
    <?php if($msg != ''){echo $msg;} ?>
    <button type="submit">Entrar</button>
  </form>

  <a href="index.php?controle=usuariosController&metodo=criarConta">Não tem uma conta? <span>Crie uma agora</span></a>
</div>
