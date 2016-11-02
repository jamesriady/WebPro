<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
            session_start();
		require_once "database.php";
		$conn = connection();
		if(!isset($_SESSION["username"]))
			die("anda belum login");

		
		$query = $conn->prepare("select * from register where username=?");
		$query->bind_param("s", $_SESSION['username']);
		$result = $query->execute();

		if(! $result)
			die("Gagal query");

		$rows = $query->get_result();
		if($rows->num_rows == 0)
			die("data tidak ditemukan");

		
		$query = $conn->prepare("delete from register where username=?");
		$query->bind_param("s", $_SESSION['username']);
		$result = $query->execute();
		if($result)
			echo "<p>User telah dihapus</p>";
		else
			echo "<p>Gagal menghapus</p>"
	?>
	<p><a href="login.html">Kembali</a></p>
</body>
</html>