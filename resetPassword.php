<?php
require_once('connect.php');
if(!isset($_GET["code"])){
    exit("Can't find page");
}
$code = $_GET["code"];

$query = "SELECT email FROM resetPassword WHERE code='$code'";
$statement = $connect->query($query);
$count = $statement->rowCount();
if($count == 0){
    exit("Can't find page");
}

if(isset($_POST["password"])){
    $password = $_POST["password"];
    //salt password for added security
    $saltPass = "483ythgfunwejksvbsm3q".$password."7dnfr234fes";
    // makes scrambled password
    $hashPass = hash('sha512', $saltPass);
    $row = $statement->fetchObject();
    $email = $row->email;
//    $email2 = [
//        'password' => $password
//    ];


    $query2 = "UPDATE user SET password='$hashPass' WHERE email='$email'";
    $statement = $connect->prepare($query2);
    $statement->execute();
    $query3 = "DELETE FROM resetPassword WHERE code='$code'";
    $statement = $connect->prepare($query3);
    $statement->execute();
    header("location:Login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
                <li><a href="Login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>
</div>
<div class="login">
    <header>Forgot Password</header>
    <form method="post">
        <br>
        <label>New Password</label>
        <div class="inputs">
            <input type="password" name="password" class="fields" />
            <br>
        </div>

        <div class="loginbtn">
            <input type="submit" name="forgotPass" class="inputs" value="Submit" />
        </div>

    </form>
</div>
<br />
</body>
</html>
