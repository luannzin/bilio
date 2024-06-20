<?php
  class Genero 
  {
    public function __construct(private int $id_genero = 0, private string $descritivo = ""){}

    public function getIdGenero()
    {
      return $this->id_genero;
    }
    public function getDescritivo()
    {
      return $this->descritivo;
    }

  }
?>
