<main class="w-full flex justify-center py-8 text-orange-900">
  <div class="w-[1200px] flex flex-col gap-8">
    <div>
      <h1 class="text-3xl"><strong>Nossa coleção</strong></h1>
    </div>
    <div class="w-full flex flex-wrap justify-between gap-32">
      <a href="index.php?controle=livrosController&metodo=verLivro&id=$livro->id_livro" class="w-1/3 flex flex-col gap-4">
        <img class="rounded-2xl hover:shadow-xl hover:shadow-orange-900/50 hover:scale-105 transition-all duration-200" src="https://m.media-amazon.com/images/I/81fzZ5aFTUL._AC_UF1000,1000_QL80_.jpg"/>
        <div class="flex flex-col gap-2">
          <span class="text-xl"><strong>Cartas de um Estoico Vol.1</strong></span>
          <span>Sêneca forjou nestas cartas sua obra-prima, o seu testamento vital, no qual inumeráveis preocupações e experiências são abordadas. As cartas constituem...</span>
        </div>
      </a>
      <a class="w-1/3">
        <img class="rounded-2xl hover:shadow-xl hover:shadow-orange-900/50 hover:scale-105 transition-all duration-200" src="https://m.media-amazon.com/images/I/81fzZ5aFTUL._AC_UF1000,1000_QL80_.jpg"/>
      </a>
      <a class="w-1/3">
        <img class="rounded-2xl hover:shadow-xl hover:shadow-orange-900/50 hover:scale-105 transition-all duration-200" src="https://m.media-amazon.com/images/I/81fzZ5aFTUL._AC_UF1000,1000_QL80_.jpg"/>
      </a>
      <a class="w-1/3">
        <img class="rounded-2xl hover:shadow-xl hover:shadow-orange-900/50 hover:scale-105 transition-all duration-200" src="https://m.media-amazon.com/images/I/81fzZ5aFTUL._AC_UF1000,1000_QL80_.jpg"/>
      </a>  
    </div>
  </div>
 
<!-- <?php foreach ($data as $livro) {
        echo "<a href='index.php?controle=livrosController&metodo=verLivro&id=$livro->id_livro'>
              <img src='$livro->imagem' />$livro->titulo
            </a>";
      } ?>
</main> -->