<main class="w-full flex justify-center py-16 text-orange-900">
  <div class="w-[1200px] flex flex-col gap-8">
    <div>
      <h1 class="text-3xl"><strong>Nossa coleção</strong></h1>
    </div>
    <div class="w-full flex flex-wrap justify-between gap-32">
      <?php foreach ($data as $livro) {
        echo "
          <a href='index.php?controle=livrosController&metodo=verLivro&id=$livro->id_livro' class='w-1/3 flex flex-col gap-4'>
          <img class='max-w-96 w-full rounded-2xl hover:shadow-xl hover:shadow-orange-900/50 hover:scale-105 transition-all duration-200' src='$livro->imagem' />
          <div class='flex flex-col gap-2'>
            <span class='text-xl'><strong>$livro->titulo</strong></span>
            <span class='truncate'>$livro->descritivo</span>
          </div>
        </a>
          ";
      } ?>
    </div>
  </div>
</main>