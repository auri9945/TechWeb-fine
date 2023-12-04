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
        $stmt = $conn->prepare("SELECT * FROM post");
        $stmt->execute();

        //Array di oggetti Post
        $publicationsData = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post -> setUser($row["user"]);
            $post -> setSubject($row["subjects"]);
            $post -> setContent($row["content"]);

            array_push($publicationsData, $post);
        }
        
        return $publicationsData;
    }
?>




