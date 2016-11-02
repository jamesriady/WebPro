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

		if(! isset($_SESSION['username'])) {
                    die('Anda belum login');
                 }
                
                if(isset($_POST['password']) && isset($_POST['email'])) {
                    $password = md5($_POST['password']);
                    $email = $_POST['email'];
                }
		$query = $conn->prepare("update register set password=?, email=? where username= ?");
		$query -> bind_param("sss", $password, $email, $_SESSION['username']);
		$result = $query->execute();

		if($result)
			echo "<p>Data berhasil diupdate</p>";
		else
			echo "<p>Gagal mengupdate data</p>";
	?>
    <p>Silahkan, <a href="profile.php">klik</a> untuk kembali ke profile</p>
</body>
</html>