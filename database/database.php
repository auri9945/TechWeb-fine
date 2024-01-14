<?php

    $host = "localhost";
    $db_name = "blog";
    $username = "root";
    $password = "";
    $conn;

    //Connessione al DB
    try {
        $conn = new PDO("mysql:host=".$host.";dbname=". $db_name.";charset=utf8", $username, $password);
    } catch(PDOException $exception) {
        echo "Connection error: " . $exception->getMessage();
    }

    
    //Estrazione dati DB
    function retrievePublicationsData() {
        global $conn;
        $stmt = $conn->prepare("SELECT 
            post.id,
            post.user,
            materie.id as id_materia,
            materie.materia,
            post.content
        FROM post 
        JOIN materie
        ON post.subject = materie.id");
        $stmt->execute();

        //Array di oggetti Post
        $publicationsData = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post($row["id"], $row["user"], $row["materia"], $row["id_materia"], $row["content"]);

            array_push($publicationsData, $post);
        }
        
        return $publicationsData;
    }

    function retriveSubjects() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM materie");
        $stmt->execute();

        $subjectsArray = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $materia = new Materia($row["id"], $row["materia"]);
            
            array_push($subjectsArray, $materia);
        }

        return $subjectsArray;
    }
?>




