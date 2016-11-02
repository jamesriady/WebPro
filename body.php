<!DOCTYPE html>
<?php
session_start();
    if(! isset($_SESSION['username'])) {
        die('Anda belum login');
    }
?>
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
        </style>
    </head>
    <body>
        <div class="wrapper">
        <img src="css/blog.png" class="logo">  
        </div>
        <div class="navi">
            <ul>
                <li><a href="">Blog</a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>
            
    </body>
</html>
