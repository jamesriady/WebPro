
        <?php
            require_once "database.php";
            require_once 'twig.php';
               
            $conn = connection();
            $query = $conn->prepare("select * from blog");
            $result = $query->execute();
            $error = false;
            $pesan = true;
            if(!$result){
                $error = true;
                $pesan = "gagal query";
            }
            $rows = $query->get_result();
            $array = array();    
            
            while($row = $rows->fetch_object()) {
                $image = "null.png";
                if($row->image!=null)
                    $image = $row->image;
                
                $item = array("judul"   => $row->judul,
                                "genre" => $row->genre,
                                "story" => $row->story,
                                "username" => $row->username,
                                "image" => $image);

            array_push($array, $item);
            }
            
            if(!$error)
                echo $twig->render("blogspot.html", array("items"=>$array));
        ?>
