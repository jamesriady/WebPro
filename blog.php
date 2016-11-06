 <?php
    session_start();
	require_once "database.php";
        require_once "twig.php";
        if(!isset($_SESSION['username']))
            echo $twig->render("pesan.html", array("pesan"=>"Anda belum login"));
        
	if(isset($_POST['judul']) && isset($_POST['genre']) && isset($_POST['story'])) {
		$judul = $_POST['judul'];
		$genre = $_POST['genre'];
		$story = $_POST['story'];

		$conn = connection();

		$query = $conn->prepare("insert into blog(judul, genre, story) values(?,?,?)");
		$query->bind_param("sss", $judul, $genre, $story);
		$result = $query->execute();

   		if($result)
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Blog berhasil di upload"));
		else
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Harap isi dengan lengkap"));
                
                
	}
	
?>
