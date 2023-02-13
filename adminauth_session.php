<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: admindashboard.php");
        exit();
    }
    exit();
?>