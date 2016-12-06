<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2016/12/4
 * Time: 下午 07:37
 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>以物易物</title>
    <link rel="stylesheet" href="css/sliedNav.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/showItem.css">
    <link href=css/justified-nav.css rel=stylesheet>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jQery.js"></script>
    <script src="js/showItem.js"></script>
    <script src="https://use.fontawesome.com/488b28b092.js"></script>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">home</a>
        <a href="index_team.php">Our Team</a>
        <a href="index_2.php">Exchange Now</a>
        <a href="#">ItemCatalog</a>
    </div>
    <span class="opennav" onclick="openNav()"> &#9776;</span>

    <div class=container>
        <div class="masthead">
            <h3 class="text-muted">Project name</h3>
            <nav>
                <ul class="nav nav-justified">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">日用品</a></li>
                    <li><a href="#">書籍</a></li>
                    <li><a href="#">食品</a></li>
                    <li><a href="#">其他</a></li>
                </ul>
            </nav>
        </div>


		<div id="main">
    	<div class=container>
        	<div class=jumbotron>
          	  <h1></h1>
            	<p class=lead>For LGC design</p>
            	<p><a class="btn btn-lg btn-success" href=# role=button>Get started today</a></p>
        	</div>
            <?php
            include 'mysql_config.php';
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result=$conn->query("select * from commodity ");
            $i=1;
            while ($row=$result->fetch_assoc()){
                if ($i==1){
                    echo "<div class=row>";
                }
                        echo "<div class=col-lg-4><h2>".$row['ItemName']."</h2>
                    <h3 style='display:none'>".$row['OwnedBy']."</h3>
                    <p>".$row['ItemInfo']."</p>
                    <button  class=\"itemBtn\">View details &raquo;</button>
                    <div  class=\"modal\">
                          <!-- Modal content -->
                          <div class=\"modal-content\">
                              <div class=\"modal-header\">
                                  <span class=\"close\">×</span>
                                  <h2>ItemName<button class=\"ui yellow button\">Exchange</button></h2>
                              </div>
                              <div class=\"modal-body\">
                                  <p>".$row['ItemName']."</p><p>".$row['ItemInfo']."</p>
                                  <img src=\"".$row['ImgUrl']."\"></div>
                              <div class=\"modal-footer\"></div></div></div></div>";

                if ($i==3){
                    echo "</div>";
                    $i=1;
                }
                else{
                    $i++;
                }

            }
            if($i!=3){
                echo "</div>";
            }
            ?>
              <footer class=footer>
                <p>&copy; Company 2014</footer>
</body>
</html>


