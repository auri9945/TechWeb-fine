<?php
// TODO spostare in API?
    session_start();
    session_destroy();
    header('location: index.php');
?>
