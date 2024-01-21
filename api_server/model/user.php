<?php
    class User {

        // connessione al DB
        private $conn;

        // attributi
        public $email;
        public $password;
        public $nickname;

        // costruttori
        function __construct($conn) {
            $this->conn = $conn;
        }


        // metodi
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }

        public function getNickname(){
            return $this->nickname;
        }
        public function setNickname($nickname){
            $this->nickname = $nickname;
        }

        
        // signup
        function signup() {
            // preparo la query
            $stmt= $this->conn->prepare("INSERT INTO user (nickname, email, password) VALUES (:nickname, :email, :password)");

            // inserisco i parametri
            $stmt->bindParam(':nickname', $this->nickname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            // eseguo la query
            $stmt->execute();

            return $stmt;
        }
        
        // login
        function login() {
            // preparo la query
            $stmt= $this->conn->prepare("SELECT * FROM user WHERE email=:email");

            // inserisco i parametri
            $stmt->bindParam(':email', $this->email);
            
            // eseguo la query
            $stmt->execute();

            return $stmt;
        }
    }
?>