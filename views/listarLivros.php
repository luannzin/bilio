<body>

  <div class="image-grid-container">
    <div class="image-grid">
      <?php foreach ($data as $livro) {
        echo "<a href='index.php?controle=livrosController&metodo=verLivro&id=$livro->id_livro'>
              <img src='$livro->imagem' />$livro->titulo
            </a>";
      } ?>
    </div>
  </div>
</body>

<style>
  .image-grid-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100vw;
    margin-top: 36px;
  }

  .image-grid {

    /* flex-wrap: wrap; */
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    gap: 6px;
  }

  .image-grid img {
    width: 125px;
    height: 150px;
    margin: 5px;

  }

  .image-grid a {
    margin-bottom: 40px;
  }
</style>
