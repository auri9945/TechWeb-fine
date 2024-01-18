<?php 
// TODO spostare in API?
session_start();
require 'api_server/database/database.php';


if(ISSET($_POST['registrazione'])){
    if($_POST['nickname'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
        try{
            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (nickname, email, password) VALUES ('$nickname', '$email', '$password')";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $_SESSION['message']=array("text"=>"Registrazione creata con successo. Perfavore effettua il login","alert"=>"info");
        $conn = null;
        header('location:index.php');
    }else{
        echo "
            <script>alert('Perfavore compila i campi obbligatori!')</script>
            <script>window.location = 'registration.php'</script>
        ";
    }
}
?>