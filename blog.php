 <?php
    session_start();
	require_once "database.php";
        require_once "twig.php";
        if(!isset($_SESSION['username']))
            echo $twig->render("login.html");
        
	if(isset($_POST['judul']) && isset($_POST['genre']) && isset($_POST['story'])) {
		$judul = $_POST['judul'];
		$genre = $_POST['genre'];
		$story = $_POST['story'];

		$conn = connection();

		$query = $conn->prepare("insert into blog(judul, genre, story) values(?,?,?)");
		$query->bind_param("sss", $judul, $genre, $story);
		$result = $query->execute();

   		if($result)
			echo $twig->render("addBlog.html");
		else
			echo $twig->render("blogTidakLengkap.html");
	}
	
?>
