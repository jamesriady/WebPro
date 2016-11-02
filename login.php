<?php
session_start();
?>

    <?php
			require_once "database.php";
			$conn = connection();
			if(isset($_SESSION['username'])) {
			header("location: body.php");
                        }
                        if(isset($_POST['username']) && isset($_POST['password'])) {
				$username   = $_POST['username'];
				$password = md5($_POST['password']);
				
				$query = $conn->prepare("select * from register where username=? and password=?");
				$query->bind_param("ss", $username, $password);
				$result = $query->execute();

				if($result)
				$rows = $query->get_result();
				if($rows->num_rows == 1) {
                                    $_SESSION['username'] = $username;
					header("location:body.php");
				}
				else{
					echo "<p>username/password salah</p>";
				}
			}else {
				echo "<p>anda belum login</p>";
			}
?>

