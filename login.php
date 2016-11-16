<?php
session_start();
?>

    <?php
			require_once "database.php";
                        require_once "twig.php";
			$conn = connection();
                        $_SESSION['last_time'] = time();
                        if(!isset($_SESSION['username']) && !isset($_POST['username']) && !isset($_POST['password'])){
                            echo $twig->render("login.html");
                        }
			else if(isset($_SESSION['username'])) {
                            echo $twig->render("body.html");
                        }
                        else if(isset($_POST['username']) && isset($_POST['password'])) {
				$username   = $_POST['username'];
				$password = md5($_POST['password']);
				$query = $conn->prepare("select * from register where username=? and password=?");
				$query->bind_param("ss", $username, $password);
				$result = $query->execute();
				if($result){
                                    $rows = $query->get_result();
                                }
                                    
				if($rows->num_rows == 1) {
                                    $_SESSION['username'] = $username;
//					echo $twig->render("body.html");
                                       header("location:body.php");
				}
				else{
					echo $twig->render("pesan.html", array("pesan"=>"Username/password salah"));
				}
			}
?>

