<?php

  session_start();
  class SessionControll
  {

    public function destroy()
    {
      $_SESSION["id_usuario"] = null;
      $_SESSION["nome"] = null;
      $_SESSION["email"] = null;
      $_SESSION["adm"] = null;

      session_destroy();
      header('location: index.php');
      exit;
    }

    public function constroy($data)
    {
      try {

        $_SESSION["id_usuario"] = $data["id_usuario"];
        $_SESSION["nome"] = $data["nome"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["adm"] = $data["adm"];

        header('location:index.php');

      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
  }
?>
