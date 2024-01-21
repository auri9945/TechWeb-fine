<?php
    session_start();

    header("Content-Type: application/json; charset=UTF-8");

    // includo classe per gestire dati
    include_once "database/database.php";
    include_once "model/user.php";

    // connessione al DB
    $database = new Database();
    $db = $database->getConnection();

    $loginData = isset($_POST['login']) ? $_POST['login'] : "";

    // recupero campi da POST e verifico che esistano
    $email = $loginData ? $loginData['email'] : "";
    $password = $loginData ? $loginData['password'] : "";

    // istanza post
    $user = new User($db);
    $user->setEmail($email);
    $user->setPassword($password);
    
    $stmt = $user->login();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($password != $row['password']) {
            http_response_code(401);
            // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
            echo json_encode(array("message" => "Password errata"));
        } else {
            $_SESSION['email'] = $row['email'];
            $_SESSION['nickname'] = $row['nickname'];
        
            http_response_code(200); 
            // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
            echo json_encode(array("message" => "Login effettuato"));
        }
    } else { 
        http_response_code(401);
        // creo un oggetto JSON costituito dalla coppia message: testo-del-messaggio
        echo json_encode(array("message" => "Email errata"));
    }
?>