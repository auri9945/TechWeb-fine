<?php
    class Materia {

        private $conn;

        // attributi
        public $id;
        public $nome;

        // costruttore
        public function __construct($db){
            $this->conn = $db;
        }

        // metodi
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

        function read() {
            $stmt = $this->conn->prepare("SELECT * FROM materie ORDER BY materia");
            $stmt->execute();

            return $stmt;
        }
    }
?>