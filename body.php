
<?php
session_start();
?>
<?php
require_once "database.php";
require_once "twig.php";
$conn = connection();
    if(isset($_SESSION['username'])) {
       echo $twig->render("body.html");
    }
    else if(!isset($_SESSION['username'])) {
        echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));
    }
?>

