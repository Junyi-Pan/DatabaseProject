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
                    <li><a href="menu.php">Movie Search</a></li>
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
    <h1>Popular Movies</h1>
    <div class="movie">
        <?php
            $query = "SELECT MID, Name, Genre, Director, Summary, Date, Image FROM movie";
            $statement = $connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            for($x = 0; $x < $count; $x++){
                $fetch = $statement->fetch();
                $name = $fetch['Name'];
                $mID = $fetch['MID'];
                $genre = $fetch['Genre'];
                $director = $fetch['Director'];
                $summary = $fetch['Summary'];
                $date = $fetch['Date'];
                $image = $fetch['Image'];
                if($x < 7):
                ?>
                <div class="moviePost">
                    <form method="post">
                        <img src="<?php echo $image;?>">
                        <br>
                        <input type="submit" class="movieBtn" name="movie" value="View Movie Page">
                        <input type="hidden" name="mID" value="<?php echo $mID;?>">
                    </form>
                </div>
                <?php endif;

            }
        ?>
    </div>
    <h1>Featured Movies</h1>
    <div class="movie">
        <?php
        $query = "SELECT MID, Name, Genre, Director, Summary, Date, Image FROM movie";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        for($x = 0; $x < $count; $x++){
            $fetch = $statement->fetch();
            $name = $fetch['Name'];
            $mID = $fetch['MID'];
            $genre = $fetch['Genre'];
            $director = $fetch['Director'];
            $summary = $fetch['Summary'];
            $date = $fetch['Date'];
            $image = $fetch['Image'];
            if($x > $count -8):
                ?>
                <div class="moviePost">
                    <form method="post">
                        <img src="<?php echo $image;?>">
                        <br>
                        <input type="submit" class="movieBtn" name="movie" value="View Movie Page">
                        <input type="hidden" name="mID" value="<?php echo $mID;?>">
                    </form>
                </div>
        <?php endif;
        }
        ?>
    </div>

</body>
</html>
