<?php
    class Post {

        // connessione
        private $conn;

        // attributi
        public $id;
        public $user;
        public $subject;
        public $subjectId;
        public $content;
        public $title;

        // costruttori
        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        // metodi
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        
        public function getUser(){
            return $this->user;
        }
        public function setUser($user){
            $this->user = $user;
        }
        
        public function getSubject(){
            return $this->subject;
        }
        public function setSubject($subject){
            $this->subject = $subject;
        }
        
        public function getSubjectId(){
            return $this->subjectId;
        }
        public function setSubjectId($subjectId){
            $this->subjectId = $subjectId;
        }
       
        public function getContent(){
            return $this->content;
        }
        public function setContent($content){
            $this->content = $content;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        
        // lettura di tutti i post
        function read() {
            $stmt = $this->conn->prepare("SELECT 
                post.id,
                post.user,
                materie.id as id_materia,
                materie.materia,
                post.content,
                post.title
            FROM post 
            JOIN materie
            ON post.subject = materie.id");

            $stmt->execute();
            
            return $stmt;
        }

        //ricerca post tramite parole chiave
        function search($keywords) {
            $query = "SELECT post.id,
                post.user,
                materie.id as id_materia,
                materie.materia,
                post.content,
                post.title
            FROM post 
            JOIN materie
            ON post.subject = materie.id
            WHERE materia LIKE ? OR post.content LIKE ? OR post.title LIKE ?";
            
            // preparo la query
            $stmt = $this->conn->prepare($query); 

            // aggiungo i %% per le LIKE - SQL 
            $keywords = "%{$keywords}%"; 
        
            // inserisco i parametri
            $stmt->bindParam(1, $keywords);
            $stmt->bindParam(2, $keywords);
            $stmt->bindParam(3, $keywords);
     
            // eseguo la query
            $stmt->execute();
        
            return $stmt;
        }	

        // creazione di un post
        function create(){
            $query = "INSERT INTO post (user, subject, content, title) VALUES (?,?,?,?)";
            $stmt= $this->conn->prepare($query);
            
            $stmt->bindParam(1, $this->user);
            $stmt->bindParam(2, $this->subject);
            $stmt->bindParam(3, $this->content);
            $stmt->bindParam(4, $this->title);

            // eseguo la query
            $stmt->execute();
        
            return $stmt;
        }

        // cancellazione di un post
	    function delete() {
            // cancello il post con l'id indicato
            $query = "DELETE FROM post WHERE id = ?";
        
            // preparo la query
            $stmt = $this->conn->prepare($query);
        
            // invio il valore per il parametro
            $stmt->bindParam(1, $this->id);

            // eseguo la query
            $stmt->execute();

            return $stmt;
	    }

        // aggiornamento di un post
        function update() {
            $query = "UPDATE post 
                        SET subject = :subject, 
                            content = :content,
                            title = :title
                        WHERE id = :id";
            $stmt= $this->conn->prepare($query);

            // invio i valori per i parametri
            $stmt->bindParam(':subject', $this->subject);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':title', $this->title);

            // eseguo la query
		    $stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query

		    return $stmt;
        }
    }
?>