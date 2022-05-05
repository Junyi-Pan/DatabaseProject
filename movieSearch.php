<?php
session_start();
$logged = isset($_SESSION["username"]);
require_once('connect.php');

if(isset($_POST['movie'])){
    $movie = $_POST['movies'];
    $movieID = $_POST['mID'];
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['PHP_SELF']) . "/movie.php?movie=$movieID";
    header("location:$url");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rotten Orange Inc.</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="images/logo.png" width="125px">
        </div>
        <h1>Rotten Orange Inc.</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="movieSearch.php">Movie Search</a></li>
                <?php if(!$logged): ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
                <?php if($logged): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
<div class="movieSearch">
    <form method="post">
        <input type="text" name="searchInfo" class="searchText" placeholder="Enter title, director, or genre">
        <input type="submit" name="search" value="Search" class="searchBtn">
    </form>
</div>

    <?php
    if(isset($_POST['search'])){
        if(!empty($_POST['searchInfo'])){
            $search = $_POST['searchInfo'];
            $query = "SELECT MID, image FROM movieView WHERE Name LIKE ? OR Genre LIKE ? OR Director LIKE ?";
            $statement = $connect->prepare($query);
            $statement->execute([$search, $search, $search]);
            $count = $statement->rowCount();
            ?>
            <h1>Search Results: </h1>
            <div class="movie">
            <?php
            if($count == 0){
                ?>
                <p><?php echo "No results from search";?></p>
                <?php

            }
            else {
                for($x = 0; $x < $count; $x++){
                    $fetch = $statement->fetch();
                    $mID = $fetch['MID'];
                    $image = $fetch['Image'];
                    ?>

                    <div class="moviePost">
                        <form method="post">
                            <img src="<?php echo $image;?>">
                            <br>
                            <input type="submit" class="movieBtn" name="movie" value="View Movie Page">
                            <input type="hidden" name="mID" value="<?php echo $mID;?>">
                        </form>
                    </div>
                    <?php
                }
            }
        }
    }
    ?>
</div>
</body>
</html>
