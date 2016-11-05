
	<?php
            session_start();
		require_once "database.php";
                require_once 'twig.php';
		$conn = connection();

		if(! isset($_SESSION['username'])) {
                    echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));
                 }
                
                if(isset($_POST['password']) && isset($_POST['email'])) {
                    $password = md5($_POST['password']);
                    $email = $_POST['email'];
                }
		$query = $conn->prepare("update register set password=?, email=? where username= ?");
		$query -> bind_param("sss", $password, $email, $_SESSION['username']);
		$result = $query->execute();

		if($result)
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Berhasil update"));
		else
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Gagal mengupdate data"));
	?>
