<?php
    session_start();
    session_destroy();
    require_once 'twig.php';
    
    header("location:login.php");
?>
