<?php
require_once "components/menu.php";
?>

<main class="w-screen h-full flex justify-center text-orange-900 mt-8">
  <div class="w-[1200px] max-h-[calc(100vh-80px-32px)] overflow-y-hidden flex flex-col gap-16">
    <div class="flex flex-col gap-6">
      <div class="flex flex-col gap-2">
        <h1 class="text-4xl"><strong>Bilio!</strong></h1>
        <span><i>"Um livro é um sonho que você segura na mão."</i></span>
      </div>
      <div>
        <button class="px-4 py-2 bg-orange-900 flex justify-center items-center text-orange-50 rounded-lg">
          Ler agora
        </button>
      </div>
    </div>
    <div>
      <img class="object-cover h-[1200px]" src="/bilio/assets/bg.webp" />
    </div>
  </div>
</main>

<!-- Os livros são as asas da imaginação, levando-nos a voar por terras desconhecidas, mergulhar em histórias -->

<style>
  .container-home-page {
    width: 100%;
    height: 100vh;
    background-color: beige;
  }

  .main-content-div {
    padding: 0 0 0 160px;
  }

  /* .main-content-div h1 {
    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  } */

  .grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* position: relative; */
    height: 100vh;
  }

  .livro-img {
    max-width: 600px;
    max-height: 450px;
    overflow-y: auto;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-left: 32px;
  }

  .grid-container .logo {
    position: absolute;
    z-index: 2;
    justify-self: center;
    margin-left: 16px;
    width: 25%;
    height: 25%;
  }

  .image-livros {
    cursor: pointer;
    width: 125px;
    height: 175px;
    margin: 5px;
    border: 1px solid #2c2c2c;
  }

  .padding-default-home {
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: start;
  }

  .padding-default-home h1 {
    font-family: 'Tangerine', serif, cursive;
    font-size: 80px;
    font-weight: 400;
  }

  .padding-default-home p {
    font-family: 'Roboto', sans-serif;
    font-size: 22px;
    font-weight: 400;
    text-indent: 64px;
  }


  .col-1 {
    background-color: #fff7e8;
    grid-column: 1 / 2;
    height: 100%;

  }

  .col-2 {
    /* background-color: #fff0d4; */
    background-image: url('./assets/fundo.jpg');
    grid-column: 2 / 3;
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
