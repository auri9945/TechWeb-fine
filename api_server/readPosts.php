<?php 
    session_start();

    header("Content-Type: application/json; charset=UTF-8");

    // includo classe per gestire dati
    include_once "database/database.php";
    include_once "model/post.php";

    // connessione al DB
    $database = new Database();
    $db = $database->getConnection();

    // istanza post
    $post = new Post($db);

    $stmt = $post->read();

    // creo una coppia post
    $post_list = array();
    $post_list["postList"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $currentUser = isset($_SESSION["nickname"]) ? $_SESSION["nickname"] : "";

        // costruisco un array associativo per ogni post
        $single_post = array(
            "id" => $row['id'],
            "user" => $row['user'],
            "id_materia" => $row['id_materia'],
            "materia" => $row['materia'],
            "content" => $row['content'],
            "title" => $row['title'],
            "createdByCurrentUser" => ($row['user'] == $currentUser)
        );
	
        // l'array viene aggiunto al fondo di post_list
        array_push($post_list["postList"], $single_post);
    }

    // trasformo la coppia post in un oggetto JSON e lo invio in HTTP response
    echo json_encode($post_list);
?>