<!-- in forse area utente -->
!DOCTYPE html>
<?php
	include 'database\database.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
      

	}
?>