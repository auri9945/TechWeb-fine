<?php 
    header("Content-Type: application/json; charset=UTF-8");

    // includo classe per gestire dati
    include_once "database/database.php";
    include_once "model/materia.php";

    // connessione al DB
    $database = new Database();
    $db = $database->getConnection();

    // istanza materia
    $subject = new Materia($db);

    $stmt = $subject->read();

    // creo una coppia materia
    $subjectList = array();
    $subjectList["subjectList"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // costruisco un array associativo per ogni materia
        $subject = array(
            "id" =>$row["id"], 
            "materia" => $row["materia"]
        );
        
        // l'array viene aggiunto al fondo di subjectList
        array_push($subjectList["subjectList"], $subject);
    }

     // trasformo la coppia post in un oggetto JSON e lo invio in HTTP response
    echo json_encode($subjectList);
?>