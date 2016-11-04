<!DOCTYPE html>

<html>
    <head>
        <title>Blog Newbie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/blogspot.css">
        
    </head>
    <body>
        <div class="wrapper">
        <img src="css/blog.png" class="logo">  
        </div>
        <div class="blogspot">
        <?php
            require_once "database.php";
            require_once 'twig.php';
            $conn = connection();
            $query = $conn->prepare("select * from blog");
            $result = $query->execute();
            $error = false;
            $pesan = true;
            if(!$result)
                $error = true;
                $pesan = "gagal query";
                
            $rows = $query->get_result();
            while($row = $rows->fetch_array()) {
                echo "<div class='border'>";
                echo "<h1>" . $row['judul'] . "</h1>";
                echo "<h2>Genre: " . $row['genre']. "</h2>";
                echo "<p>" . $row['story'] . "</p>";
                echo "</div>";
                echo "<br>";
            }
        ?>
        </div>
        
    </body>
</html>
