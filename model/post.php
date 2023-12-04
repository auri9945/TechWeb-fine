<?php
    class Post {
        //Attributi
        private string $user;
        private string $subject;
        private string $content;

        //Metodi
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

       
        public function setContent($content){
            $this->content = $content;
        }
        public function getContent(){
            return $this->content;
        }
    }
?>