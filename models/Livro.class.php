<?php
class Livro
{
  public function __construct(private int $id_livro = 0, private string $titulo = "", private string $descritivo = "", private $autor = null, private $genero = null)
  {
  }

  public function getIdLivro()
  {
    return $this->id_livro;
  }
  public function getDescritivo()
  {
    return $this->descritivo;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function getAutor()
  {
    return $this->autor;
  }

  public function getGenero()
  {
    return $this->genero;
  }
}
