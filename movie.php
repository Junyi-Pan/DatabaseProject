<?php
session_start();
$logged = isset($_SESSION["username"]);
require_once('connect.php');
if($logged){
    $query = "SELECT uID FROM user WHERE username = :username";
    $statement = $connect->prepare($query);
    $statement->execute(
            array(
                    'username'=>$_SESSION["username"]
            )
    );
    $fetch = $statement->fetch();
    $uID = $fetch['uID'];
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
                    <?php else: ?>
                        <li><a href="editProfile.php">Edit Profile</a></li>
                    <?php endif; ?>
                    <?php if($logged): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
    </div>
    <?php
        $mID = $_GET['movie'];
        $query = "SELECT MID, Name, Genre, Director, Summary, Date, Image, Rating FROM movie WHERE MID = :mid";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'mid' => $mID
            )
        );
        $count = $statement->rowCount();
        if($count == 0){
            exit("Can't find page");
        }
        $fetch = $statement->fetch();
        $genre = $fetch['Genre'];
        $director = $fetch['Director'];
        $summary = $fetch['Summary'];
        $date = $fetch['Date'];
        $image = $fetch['Image'];
        $name = $fetch['Name'];
        $movieRating = $fetch['Rating'];

        if(isset($_POST['reviewBtn'])){
            if(!empty($_POST['review']) && isset($_POST['rating'])){
                $reviewText = $_POST['review'];
                $reviewRating = $_POST['rating'];
                $query = "INSERT INTO review(Text, UID, MID, Rating) VALUES(?,?,?,?)";
                $statement = $connect->prepare($query);
                $statement->execute([$reviewText, $uID, $mID, $reviewRating]);
                unset($_POST['review']);
            }

        }
    ?>
    <div class="moviePageContainer">
        <div class="movieContainer">
            <div class="moviePage">
                <img src="<?php echo $image;?>">
                <div>
                    <h1><?php echo $name;?></h1>
                    <div class="rating">
                        <h2>Rating: <?php echo $movieRating?>/5</h2>
                    </div>
                </div>
            </div>
            <div class="movieText">
                <h3>Director: </h3>
                <?php echo $director;?>
                <h3>Genre: </h3>
                <?php echo $genre;?>
                <h3>Release Date: </h3>
                <?php echo $date;?>
                <h3>Summary: </h3>
                <?php echo $summary;?>
            </div>
        </div>
        <div class="reviewContainer">
            <h1>Reviews</h1>
            <?php if($logged):?>
            <form method="post">
                <div class="reviewBox">
                    <select name="rating" id="rating">
                        <option selected disabled hidden>Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="reviewBox">
                    <input type="text" name="review" placeholder="Write a review here!">
                </div>
                <div class="reviewBtn">
                    <input type="submit" class="movieBtn" name="reviewBtn" value="Post Review">
                </div>
            </form>

            <?php endif;

                $query = "SELECT MID, UID, Text FROM review WHERE MID = :mid";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'mid' => $mID
                    )
                );
                $count = $statement->rowCount();
                for($x = 0; $x < $count; $x++){
                    $fetch = $statement->fetch();
                    $uID = $fetch['UID'];
                    $review = $fetch['Text'];
                    $query2 = "SELECT username FROM user WHERE uID = :uid";
                    $statement2 = $connect->prepare($query2);
                    $statement2->execute(
                            array(
                                    'uid' => $uID
                            )
                    );
                    $fetch2 = $statement2->fetch();
                    $user = $fetch2['username'];
                    ?>
                    <div class="review">
                        <strong>User: <?php echo $user;?></strong>
                        <br><br>
                        <?php echo $review;?>
                    </div>
                   <?php
                }
            ?>
        </div>
    </div>
</body>
</html>