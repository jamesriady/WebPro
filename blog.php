 <?php
    session_start();
	require_once "database.php";
        if(!isset($_SESSION['username']))
            die("Anda belum login");
        
	if(isset($_POST['judul']) && isset($_POST['genre']) && isset($_POST['story'])) {
		$judul = $_POST['judul'];
		$genre = $_POST['genre'];
		$story = $_POST['story'];

		$conn = connection();

		$query = $conn->prepare("insert into blog(judul, genre, story) values(?,?,?)");
		$query->bind_param("sss", $judul, $genre, $story);
		$result = $query->execute();

   		if($result)
			echo "<p>Berhasil ditambahkan</p>";
		else
			die("Error");
	}
	else {
		echo "<pre>Ada yang belum terisi</pre>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Kembali ke halaman utama, klik <a href="body.php">disini</a></p>
</body>
</html>