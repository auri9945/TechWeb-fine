<?php
    class Post {
        //Attributi
        private int $id;
        private string $user;
        private string $subject;
        private string $subjectId;
        private string $content;

        //Costruttori
        public function __construct($id, $user, $subject, $subjectId, $content)
        {
            $this->id = $id;
            $this->user = $user;
            $this->subject = $subject;
            $this->subjectId = $subjectId;
            $this->content = $content;
        }

        //Metodi
        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }


        public function setUser($user){
            $this->user = $user;
        }
        public function getUser(){
            return $this->user;
        }

        
        public function setSubject($subject){
            $this->subject = $subject;
        }
        public function getSubject(){
            return $this->subject;
        }


        public function setSubjectId($subjectId){
            $this->subjectId = $subjectId;
        }
        public function getSubjectId(){
            return $this->subjectId;
        }

       
        public function setContent($content){
            $this->content = $content;
        }
        public function getContent(){
            return $this->content;
        }
    }
?>