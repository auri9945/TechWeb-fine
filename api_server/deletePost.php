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
  
    // leggo l'id nella richiesta GET
    $id_toDel = isset($_GET['postId']) ? $_GET['postId'] : die();
    // inserisco l'id nella variabile di istanza id dell'oggetto $post 
    $post->setId($id_toDel);

    // invoco il metodo delete() che cancella il post indicato
    if ($post->delete()) { 
        http_response_code(200); 
        // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
        echo json_encode(array("message" => "Post cancellato"));
        }
    else { 
        http_response_code(503);
        // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
        echo json_encode(array("message" => "Non è stato possibile cancellare il post"));
    }
?>