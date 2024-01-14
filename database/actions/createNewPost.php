<?php
    include "../database.php";

    $dataJson=$_POST['newPost'];
    print_r($dataJson);

    try {  
        $conn->beginTransaction();

        $sql = "INSERT INTO post (user, subject, content) VALUES (?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute(['', $dataJson['materia'], $dataJson['contenuto']]);

        $res = $conn->commit();

        exit($res);
    } catch (Exception $e) {
      $conn->rollBack();
      echo "Failed: " . $e->getMessage();
    }
?>