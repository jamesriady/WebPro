
	<?php
            session_start();
            session_destroy();
		require_once "database.php";
		require_once 'twig.php';
                $conn = connection();
		if(!isset($_SESSION["username"]))
                    echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));

		
		$query = $conn->prepare("select * from register where username=?");
		$query->bind_param("s", $_SESSION['username']);
		$result = $query->execute();

		if($result)
                    $rows = $query->get_result();

		
		$query = $conn->prepare("delete from register where username=?");
		$query->bind_param("s", $_SESSION['username']);
		$result = $query->execute();
		if($result)
			echo $twig->render("pesan.html", array("pesan"=>"User telah dihapus"));
		else
			echo $twig->render("pesanRegister.html", array("pesan"=>"Gagal menghapus user"));
	?>
