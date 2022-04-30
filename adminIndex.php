<?php
require_once('connect.php');
session_start();
$logged = isset($_SESSION["username"]);
if(isset($_POST['addMovie'])){
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $summary = $_POST['summary'];
    $date = $_POST['date'];
    $image = $_POST['image'];

    $query1 = "SELECT * FROM admin WHERE Username = '".$_SESSION['username']."'";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $admin = $statement1 -> fetch();
        $aid = $admin['AID'];
        $statement1->closeCursor();

    $query2 = "INSERT INTO movie (Name, Genre, Director, Summary, Date, AID, Image) VALUES(?,?,?,?,?,?,?)";
        $statement2 = $connect->prepare($query2);
        $statement2->execute([$name, $genre, $director, $summary, $date, $aid, $image]);
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

        <?php if($logged){
            if($_SESSION["username"] == "admin"):
        ?>
        <nav>
            <ul>
                <li><a href="adminIndex.php">Home</a></li>
                <?php if($logged): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>

            </ul>
        </nav>
        <?php endif;
        }
        ?>
    </div>
</div>
<div class="login">
    <form method="post">
        <div class="inputs">
            <label>Title</label>
            <input type="text" name="name" class="fields" required>
            <label>Genre</label>
            <input type="text" name="genre" class="fields" required>
            <label>Director</label>
            <input type="text" name="director" class="fields" required>
            <label>Summary</label>
            <input type="text" name="summary" class="fields" required>
            <label>Image</label>
            <input type="text" name="image" class="fields" required>
            <label>Date</label>
            <input type="date" name="date" class="fields" required>

        </div>
        <div class="loginbtn">
            <input type="submit" name="addMovie" class="inputs" value="Add Movie" />
        </div>

    </form>
</div>
<?php if(!$logged || $_SESSION["username"] != "admin"){
    echo "You are not authorized to view this page";
}
?>


</body>
</html>
