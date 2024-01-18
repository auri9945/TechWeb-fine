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

    // leggo le keywords (parametro keywords) nella richiesta (GET)
    $keywords = isset($_GET["keywords"]) ? $_GET["keywords"] : "";
    // invoco il metodo search() che restituisce la lista dei post che soddisfano la query
    $stmt = $post->search($keywords);
    
    if($stmt->rowCount() > 0) {
        // creo una coppia post
        $post_list = array();
        $post_list["postList"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // costruisco un array associativo per ogni post
            $single_post = array(
                "id" => $row['id'],
                "user" => $row['user'],
                "id_materia" => $row['id_materia'],
                "materia" => $row['materia'],
                "content" => $row['content']
            );
        
            // l'array viene aggiunto al fondo di post_list
            array_push($post_list["postList"], $single_post);
        }

        // setto il codice di ritorno HTTP a 200 - success
        http_response_code(200);

        // trasformo la coppia post in un oggetto JSON e lo invio in HTTP response
        echo json_encode($post_list);
    } else {
        // setto il codice di ritorno HTTP a 404 - not found
        http_response_code(404);

        // invio il messaggio in HTTP response
        echo json_encode(array("message" => "Nessun post corrispondente ai criteri di ricerca"));
    }
?>