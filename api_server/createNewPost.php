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

  $dataJson=$_POST['newPost'];

  // inserisco i valori nelle variabili d'istanza dell'oggetto post
  $post->setUser('');
  $post->setTitle($dataJson['titolo']);
  $post->setSubject($dataJson['materia']);
  $post->setContent($dataJson['contenuto']);

  $stmt = $post->create();

  // setto il codice di ritorno HTTP a 201 - creato
  http_response_code(201);

  // invio il messaggio in HTTP response
  echo json_encode(array("message" => "IPost creato"));
?>