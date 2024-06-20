<?php
require_once "views/components/menu.php";
?>

<?php ob_start(); ?>
<div class="container">
  <h2 class=" mt-16 text-xl font-bold my-3">Alterar livro</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titulo">Título:</label>
      <input type="text" id="titulo" name="titulo" value='<?php echo $data[0]->titulo; ?>'>
    </div>
    <div class="form-group">
      <label for="descritivo">Descritivo:</label>
      <textarea id="descritivo" name="descritivo"><?php echo $data[0]->descritivo; ?></textarea>
    </div>
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" id="image" name="image" value=''>
      <input hidden id='pathImage' value='<?php echo $data[0]->imagem ?? ""; ?>'>
    </div>
    <div class="form-group">
      <label for="idAutor">Autor(a):</label>
      <?php
      foreach($dataAutor as $autores) { 
        $num = explode(',',$autores->livro_id);
        if(in_array($data[0]->id_livro, $num))
        {
          echo '<input type="checkbox" checked name="autor[]" value='.$autores->id_autor.'>' . $autores->nome;
        }
        else{
          echo '<input type="checkbox" name="autor[]" value='.$autores->id_autor.'>' . $autores->nome;
        } 
      }
      ?>
    </div>
    <div class="form-group">
      <label for="idGenero"> Gênero:</label>
      <?php
      foreach ($dataGen as $generos) {
        $num = explode(',',$generos->livro_id);
          if(in_array($data[0]->id_livro, $num))
          {
            echo '<input type="checkbox" checked name="genero[]" value='.$generos->id_genero.'>' . $generos->descritivo;
          }
          else{
            echo '<input type="checkbox" name="genero[]" value='.$generos->id_genero.'>' . $generos->descritivo;
          }
      }
      ?>
    </div>
    <input type="submit" value="Alterar">
  </form>
</div>
<script>
  function loadURLToInputFiled(){
    url= document.getElementById('pathImage').value;
    if(!url){
      return;
    }
    url='http://localhost/biblio/'+url;
    getImgURL(url, (imgBlob)=>{
    let fileName = url.substring(url.lastIndexOf('/')+1);
    let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
    let container = new DataTransfer(); 
    container.items.add(file);
    document.querySelector('#image').files = container.files;
    
  })
  }
  function getImgURL(url, callback){
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
