
<?php
// TODO spostare in API?

	include_once 'api_server/database/database.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
      

	}
?>