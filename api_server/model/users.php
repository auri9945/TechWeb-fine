<?php
class Users {

private $conn;
public $email;
public $password;

function __construct($conn)
{
    $this->conn = $conn;
}

function login(){
   
    if(isset($_POST["login"])) {

        if($_POST["email"]=="" or $_POST["password"]=="") {
            //$msg= "ciao!";
    
        }else{
            $query= "SELECT * FROM user WHERE email=:email";
            $stmt= $this->conn->prepare($query);
            $stmt->bindParam(":email",$_POST["email"]);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // costruisco un array associativo per ogni utente
                $control= array(
                    "email" => $row["email"],
                    "password" => $row["password"]
                );
            }
            if(!$control){
                echo "email inesistente";
            } else
            {
                if ($_POST["password"] != $control["password"]) { // se la password non è corretta
                    echo "Password errata";
                } 
                else{
                    $_SESSION["email"] = $control["email"];
                
                    header('Location:../index.php');
                    exit;
                }
            }
    
        }
    }


}


}
?>