
        <?php
            require_once "database.php";
            require_once 'twig.php';
            
            $conn = connection();
            
            $limit = 1;
            
            $q = "%" . (isset($_GET['q']) ? $_GET['q'] : "") . "%";
            $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
            $offset = ($p * $limit) - $limit;
            $query = $conn->prepare("select * from blog where judul like ? limit ? offset ?");
            $query->bind_param("sii", $q, $limit, $offset);
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
            
            $query = $conn->prepare("select count(*) as halaman from blog where judul like ?");
            $query->bind_param("s", $q);
            $result = $query->execute();
            $rows = $query->get_result();
            $row = $rows->fetch_object();
            $pages = ceil($row->halaman/$limit);
            
            // bangun url baru untuk pages filter
            $q_s = $_SERVER["QUERY_STRING"];
            $page_urls = array();
            for ($page = 1; $page <= $pages; $page++) {
                    if (strpos($q_s, "p=$p")) {
                            $url = "?" . str_replace("p=$p", "p=" . $page, $q_s);
                    } else {
                            $url = "?" . $q_s . "&p=$page";
                    }
                    array_push($page_urls, $url);
            }

            
            if ($p < 1 || $p > $pages) {
                die("Data Not Found");
            }
            
            if(!$error)
                echo $twig->render("blogspot.html", array("items"=>$array, "page"=>$pages, "p"=>$p, "page_urls" =>$page_urls));
        ?>
