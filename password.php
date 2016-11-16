
	<?php
            session_start();
		require_once "database.php";
                require_once 'twig.php';
		$conn = connection();
                
                $user = $_SESSION['username'];
                
		if($user){
                    echo $twig->render("password.html");
                    
                    
                    if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmnewpassword'])) {
                        $oldpassword = md5($_POST['oldpassword']);
                        $newpassword = md5($_POST['newpassword']);
                        $confirmnewpassword = md5($_POST['confirmnewpassword']);
                        
                        $query = $conn->prepare("select password from register where username=?");
                        $query->bind_param("s", $user);
                        $result = $query->execute();
                       
                        if(!$result)
                            die("Proses query gagal");
                        
                        $rows = $query->get_result();
                        while ($row = $rows->fetch_array()) {
                            $password = $row['password'];
                        }
                        if($oldpassword == $password){
                            if($newpassword == $confirmnewpassword) {
                                $query_update = $conn->prepare("update register set password = ? where username = ?");
				$query_update->bind_param("ss", $newpassword, $user);
				$result_update = $query_update->execute();
				if(!$result_update)
					die("Proses query gagal");
                                
                                echo "update berhasil";
                            }
                        }else{
                            echo"password tidak cocok";
                        }
                        
                    }
                
                }
                
	?>
