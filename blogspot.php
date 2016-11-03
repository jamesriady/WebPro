<!DOCTYPE html>

<html>
    <head>
        <title>Blog Newbie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                width: 100%;
                margin: 0 auto;
                background: url('css/background.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }
            .wrapper{
                margin: 0 auto;
                width: 100px;
            }
            .logo{
                width: 150px;
                height: 150px;
            }
                        .navi {
                            background: #f4b642;
			  width: 100%;
			  padding: 0;
			  height: 60px;
			  position:relative;
			  margin: 0 auto;
			    
			}
			.navi ul {
			  list-style:none;
			  padding:0 20px;
			  margin: 0 auto;
			  width: 1000px;
			  height: 60px;
			}
			.navi ul li {
			  display: inline-block;
			  font-size: 20pt;
			}
                        .navi ul li a {
			  color: #000;
			  display:block;	
			  padding:0px 40px;
			  text-decoration:none;
			  float: left;
			  height: 60px;
			  line-height: 60px;
			}
			.navi ul li:hover {
			  background: #333333;
			}
			.navi ul li:hover > a{
			    color:#FFFFFF;
			}
                        .body{
                            margin: 0 auto;
                            width: 720px;
                            margin-top: 30px;
                        }
                        label{
                            font-size: 30px;
                        }
                        .judul input{
                            width: 350px;
                            margin-left: 30px;
                            height: 25px;
                            font-size: 20px;
                        }
                        .genre select{
                            width: 100px;
                            margin-left: 275px;
                            height: 25px;
                            font-size: 20px;
                        }
                        .story textarea {
                            width: 600px;
                            margin-left: 110px;
                            height: 300px;
                            font-size: 12px;
                            margin-top: -20px;
                        }
                        .btn{
                            width: 80px;
                            margin: 0 auto;
                            float: right;
                        }
                        .btn input{
                            width: 80px;
                            height: 25px;
                            margin : 20px 0px 0 0px;
                            
                        }
                        .blogspot{
                            width: 1000px;
                            margin: 0 auto;
                            margin-top: 50px;
                        }
                        h1{
                            margin-top: -5px;
                            text-transform: capitalize;
                        }
                        h2{
                            margin-top: -20px;
                            text-transform: capitalize;
                        }
                        h1, h2, p{
                            text-indent: 0.2em;
                            letter-spacing: 1.5px;;
                        }
                        .border{
                            border: 1px solid;
                            background: #FFFFFF;
                            color: #f4b642;
                        }
        </style>
    </head>
    <body>
        <div class="wrapper">
        <img src="css/blog.png" class="logo">  
        </div>
        <div class="blogspot">
        <?php
            require_once "database.php";
            $conn = connection();
            $query = $conn->prepare("select * from blog");
            $result = $query->execute();
            
            if(!$result)
                die("gagal query");
                
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
