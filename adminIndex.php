<?php
session_start();
$logged = isset($_SESSION["username"]);
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
<?php if(!$logged || $_SESSION["username"] != "admin"){
    echo "You are not authorized to view this page";
}
?>


</body>
</html>
