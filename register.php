 <?php
	require_once "database.php";
        require_once "twig.php";
        if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['email']) && !isset($_POST['gender']) && !isset($_POST['tanggallahir'])) {
            echo $twig->render("register.html");
        }
	else if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['tanggallahir'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_encrypt = md5($password);
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$tanggallahir = $_POST['tanggallahir'];

		$conn = connection();

		$query = $conn->prepare("insert into register(username,password,email,gender,tanggallahir) values(?,?,?,?,?)");
		$query->bind_param("sssss", $username, $password_encrypt, $email, $gender, $tanggallahir);
		$result = $query->execute();

   		if($result)
			echo $twig->render("pesan.html", array("pesan"=>"Data teregister"));
		else
			echo $twig->render("pesanRegister.html", array("pesan"=>"Username sudah terpakai"));
	}
	else {
		echo $twig->render("pesanRegister.html", array("pesan"=>"Data tidak lengkap"));
	}
?>
