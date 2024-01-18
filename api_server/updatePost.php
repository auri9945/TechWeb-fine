<?php
    header("Content-Type: application/json; charset=UTF-8");

    // includo classe per gestire dati
    include_once "database/database.php";
    include_once "model/post.php";

    // connessione al DB
    $database = new Database();
    $db = $database->getConnection();

    // istanza post
    $post = new Post($db);

    // leggo le keywords (parametro keywords) nella richiesta (POST)
    $titolo = isset($_POST["titolo"]) ? $_POST["titolo"] : "";
    $idMateria = isset($_POST["idMateria"]) ? $_POST["idMateria"] : "";
    $contenuto = isset($_POST["contenuto"]) ? $_POST["contenuto"] : "";
    $id = isset($_POST["id"]) ? $_POST["id"] : "";

    $post->setTitle($titolo);
    $post->setSubject($idMateria);
    $post->setContent($contenuto);
    $post->setId($id);

    if($post->update()) { // se va a buon fine...
        http_response_code(200); // response code 200 = tutto ok
        // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
        echo json_encode(array("message" => "Post aggiornato"));
        }
    else { // se l'aggiornamento è fallito...
        http_response_code(503); // response code 503 = service unavailable
        // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
        echo json_encode(array("message" => "Non è stato possibile aggiornare il post"));
    }
?>