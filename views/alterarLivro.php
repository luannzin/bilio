<?php
require_once "views/components/menu.php";
?>

<?php ob_start(); ?>
<div class="mt-16 w-screen flex justify-center items-center text-orange-900">
  <div class="w-[600px] flex flex-col items-center justify-center gap-8">
    <span class="text-2xl"><strong>Alterar livro</strong></span>
    <form class="w-full flex flex-col gap-4" enctype="multipart/form-data" method="post">
      <div class="flex flex-col w-full gap-4">
        <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="text" placeholder="Título" name="titulo" value="<?php echo $data[0]->titulo; ?>" required />
        <textarea class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" placeholder="Descritivo" name="descritivo" required>
          <?php echo $data[0]->descritivo; ?>
        </textarea>
        <label class="flex flex-col gap-1">
          <span>Imagem</span>
          <input class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" type="file" id="image" name="image" value="<?php echo $data[0]->imagem ?? ""; ?>" required />
        </label>
        <label class="flex flex-col gap-1">
          <span>Autor</span>
          <select value="<?php
                          foreach ($dataAutor as $autores) {
                            $num = explode(',', $autores->livro_id);
                            if (in_array($data[0]->id_livro, $num)) {
                              echo $autores->id_autor;
                            }
                          }
                          ?>" class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" name="autor[]" required>
            <?php
            foreach ($dataAutor as $autores) {
              echo '<option class="w-full py-2" value=' . $autores->id_autor . '>' . $autores->nome . '</option>';
            };
            ?>
          </select>
        </label>
        <label class="flex flex-col gap-1">
          <span>Gênero</span>
          <select class="w-full px-6 py-4 border border-orange-900 rounded-lg bg-orange-50" name="genero[]" required>
            <?php
            foreach ($dataGen as $generos) {
              echo '<option class="w-full py-2" value=' . $generos->id_genero . '>' . $generos->descritivo;
            };
            ?>
          </select>
        </label>
      </div>
      <button class="w-full bg-orange-900 text-orange-50 py-4 rounded-lg" type="submit" value="Alterar">Alterar</button>
    </form>
  </div>
</div>

<script>
  function loadURLToInputFiled() {
    url = document.getElementById('pathImage').value;
    if (!url) {
      return;
    }
    url = 'http://localhost/biblio/' + url;
    getImgURL(url, (imgBlob) => {
      let fileName = url.substring(url.lastIndexOf('/') + 1);
      let file = new File([imgBlob], fileName, {
        type: "image/jpeg",
        lastModified: new Date().getTime()
      }, 'utf-8');
      let container = new DataTransfer();
      container.items.add(file);
      document.querySelector('#image').files = container.files;

    })
  }

  function getImgURL(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      callback(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
  }
  loadURLToInputFiled();
</script>