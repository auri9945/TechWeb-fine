<?php
    class Materia {
        //Attributi
        private int $id;
        private string $nome;

        //Costruttore
        public function __construct($id, $nome){
            $this->id = $id;
            $this->nome = $nome;
        }

        //Metodi
        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }
    }
?>