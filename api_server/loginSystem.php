<?php


header("Content-Type: application/json; charset=UTF-8");

// includo classe per gestire dati
include_once "database/database.php";
include_once "model/users.php";

// connessione al DB
$database = new Database();
$db = $database->getConnection();

// istanza post
$session = new Users($db);
$dataJson=$_POST['login'];



if ($session->login()) { 
    http_response_code(200); 
    // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
    echo json_encode(array("message" => "Login effettuato"));
    }
else { 
    http_response_code(503);
    // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
    echo json_encode(array("message" => "Non è stato possibile effettuare il login"));
}


?>