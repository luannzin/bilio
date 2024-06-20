<?php
    class Autor 
    {
        public function __construct(private int $id_autor = 0,private string $nome = ""){}
        
        public function getIdAutor()
        {
            return $this->id_autor;
        }
    
        public function getNome()
        {
            return $this->nome;
        }
    }
?>
