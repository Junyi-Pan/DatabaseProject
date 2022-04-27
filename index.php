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
    <h1>Popular Movies</h1>


</body>
</html>
