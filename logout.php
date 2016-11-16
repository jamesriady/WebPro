<?php
    session_start();
    session_destroy();
    require_once 'twig.php';
    
    echo $twig->render("pesan.html", array("pesan"=>"Berhasil logout"));
 
?>
