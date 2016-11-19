
	<?php
            session_start();
		require_once "database.php";
                require_once 'twig.php';
		$conn = connection();
                
                $user = $_SESSION['username'];
                
		if($user){
                    $conn = connection();
                    $query = $conn->prepare("select * from register where username= ?");
                    $query->bind_param("s", $_SESSION['username']);
                    $result = $query->execute();
                
                    if($result)
                        $rows = $query->get_result();

                    if ($rows->num_rows == 1 || isset($_SESSION['username'])){
                        $row = $rows->fetch_array();        
                        echo $twig->render("email.html", array("data"=>$row));
                    }
                    
                    if(isset($_POST['newemail'])) {
                        $newemail = $_POST['newemail'];
                        if($newemail != ""){
                                $query_update = $conn->prepare("update register set email = ? where username = ?");
				$query_update->bind_param("ss", $newemail, $user);
				$result_update = $query_update->execute();
				if(!$result_update){
					die("Proses query gagal");
                                }
                                    echo "<script>alert('Email berhasil di ganti')</script>";
                                    echo "<script>window.close();</script>"; 
                        }
                        else{
                            echo "<script>alert('Email tidak valid')</script>";
                        }
                    }
                }
?>
