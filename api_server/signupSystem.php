<?php
    session_start();

    header("Content-Type: application/json; charset=UTF-8");

    // includo classe per gestire dati
    include_once "database/database.php";
    include_once "model/user.php";

    // connessione al DB
    $database = new Database();
    $db = $database->getConnection();

    // recupero campi da POST e verifico che esistano
    /*
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    */

    $dataJson=$_POST['signup'];

    // istanza post
    // inserisco i valori nelle variabili d'istanza dell'oggetto post
    $user = new User($db);
    $user->setNickname($dataJson['nickname']);
    $user->setEmail($dataJson['email']);
    $user->setPassword($dataJson['password']);

    try {
        $user->signup();
        // setto il codice di ritorno HTTP a 201 - creato
        http_response_code(201);

        // invio il messaggio in HTTP response
        echo json_encode(array("message" => "Utente registrato. Ora è possibile accedere"));
    } catch (PDOException $e) {
        // setto il codice di ritorno HTTP a 409 - conflitto
        http_response_code(409);

        // invio il messaggio in HTTP response
        echo json_encode(array("message" => "Errore in fase di registrazione: ".$e->getMessage()));
    }
?>