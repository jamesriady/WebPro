<?php

	session_start();
?>
<?php
         require_once "database.php";
         require_once 'twig.php';
		if(! isset($_SESSION['username'])) {
                    echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));
                }
                

		$conn = connection();
		$query = $conn->prepare("select * from register where username= ?");
                $query->bind_param("s", $_SESSION['username']);
                $result = $query->execute();
                
                if($result)
                    $rows = $query->get_result();
                
                if ($rows->num_rows == 1 || isset($_SESSION['username'])){
                    $row = $rows->fetch_array();        
                    echo $twig->render("profile.html", array("data"=>$row));
                }
			
                
	?>
