<!DOCTYPE html>
<?php

	session_start();
?>
<?php
         require_once "database.php";

		if(! isset($_SESSION['username'])) {
                    die('Anda belum login');
                 }

		$conn = connection();
		$query = $conn->prepare("select * from register where username= '" . $_SESSION['username'] . "'");
                $result = $query->execute();
                
                if(! $result)
			die("Gagal query");
                
		$rows = $query->get_result();
                if ($rows->num_rows == 0)
			die ("<p>Data tidak ditemukan</p>");

		$data = $rows->fetch_object();   
//                $url_delete ="delete.php?username=" . $row['username'];  
                
	?>
<html>
<head>
        <title>Blog Newbie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <div class="wrapper">
        <img src="css/blog.png" class="logo">  
        </div>
        <div class="navi">
            <ul>
                <li><a href="body.php">Blog</a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>
        
	
	<form method="post" action="edit.php?username=<?php echo $data->username; ?>" enctype="multipart/form-data">
            <div class="username">
			<label>Username:</label>
			<span><?php echo $data->username; ?></span>
		</div>
            <div class="password">
			<label>Password:</label>
			<input type="password" name="password" value="<?php echo $data->password; ?>">
		</div>
            <div class="email">
			<label>Email:</label>
			<input type="text" name="email" value="<?php echo $data->email; ?>">
		</div>
            <div class="gender">
			<label>Gender:</label>
			<span><?php echo $data->gender; ?></span>
		</div>
            <div class="tanggal">
			<label>Tanggal lahir:</label>
			<span><?php echo $data->tanggallahir; ?></span>
		</div>
		
            <div class="tombol"><input type="submit" value="Update" class="submit"></div>
             
	</form>
        <div class="tombol"><a href="delete.php"><button>Delete Account</button></a></div> 
        <div class="tombol"><a href="Logout.php"><button>Logout</button></a></div>

</body>
</html>