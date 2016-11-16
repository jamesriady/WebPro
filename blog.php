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
                
                $fileGambar = "";
                if(isset($_FILES['image'])){
                    if($_FILES['image']['error'] == 0){
                        $image = $_FILES['image'];
                        $extension = new SplFileInfo($image['name']);
                        $extension->getExtension();
                        $fileGambar = $extension;
                        copy($image['tmp_name'], 'images/' . $fileGambar);
                    }
                
		$conn = connection();
		$query = $conn->prepare("insert into blog(username, judul, genre, story, image) values(?,?,?,?,?)");
		$query->bind_param("sssss",$_SESSION['username'], $judul, $genre, $story, $fileGambar);
		$result = $query->execute();

   		if($result)
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Blog berhasil di upload"));
		else
			echo $twig->render("pesanUpdate.html", array("pesan"=>"Harap isi dengan lengkap"));
                
                
	}}
	
?>
