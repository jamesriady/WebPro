<?php
session_start();
require_once 'database.php';
require_once 'twig.php';
if(isset($_SESSION['username'])) {
    echo $twig->render("about.html");
}else if(!isset($_SESSION['username'])) {
    echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));
}
?>