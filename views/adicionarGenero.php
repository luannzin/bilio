<?php
require_once "views/components/menu.php";
?>

<div class="container">
  <h2 class=" mt-16 text-xl font-bold my-3">Adicionar genero</h2>
  <form method="post">
    <div class="form-group">
      <label for="descritivo">Descritivo:</label>
      <input id="descritivo" name="descritivo"></input>
    </div>
    <input type="submit" value="Adicionar">
  </form>
</div>

<style>
  .container {
    width: 400px;
    margin: 0 auto;
  }

  select {
    width: 100%
  }

  h2 {
    text-align: center;
  }

  .form-group {
    margin-bottom: 10px;
  }

  label {
    display: block;
    font-weight: bold;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
  }

  input[type="file"] {
    width: 100%;
    padding: 5px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
