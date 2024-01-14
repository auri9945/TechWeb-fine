<?php

session_start();

include 'database\database.php';

if(ISSET($_POST['login'])){
    if($_POST['email'] != "" || $_POST['password'] != ""){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `user` WHERE `email` =? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
            $row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['id'];
				header('location: index.php');
			} else{
				echo "
				<script>alert('Username o Password non validi')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Per favore completa il campo obbligatorio')</script>
				<script>window.location = 'index.php'</script>";
    }
}
?>
