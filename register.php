<?php
// <input type="text" name="address" class="fields"/>
//            <label>City</label>
//            <input type="text" name="city" class="fields"/>
//            <label>State</label>
//            <input type="text" name="state" class="fields"/>
//            <label>Zip Code</label>
//            <input type="text" name="zip" class="fields"/>
//            <label>Card Number</label>
//            <input type="text" name="cardNo" class="fields"/>
//            <label>Card Pin</label>
//            <input type="text" name="cardPin" class="fields"/>
//            <label>Card Expiration</label>
//            <input type="text" name="cardExpir" class="fields"/>

require_once('connect.php');
    if(isset($_POST['register'])){
        if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
            $message = '<label>Username, Password, Email are required</label>';
        }
        else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            
            //salt password for added security
            $saltPass = "483ythgfunwejksvbsm3q".$password."7dnfr234fes";
            // makes scrambled password
            $hashPass = hash('sha512', $saltPass);

            $query = "INSERT INTO user (username, password, email) VALUES(?,?,?)";
            $statement = $connect->prepare($query);
            // insert hashed password into table with other info
            $statement->execute([$username,$hashPass,$email]);
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
    <header>Register</header>
    <form method="post">
        <label>Username</label>
        <div class="inputs">
            <input type="text" name="username" class="fields"/>
            <br />
            <label>Password</label>
            <input type="password" name="password" class="fields"/>
            <br />
            <label>Email</label>
            <input type="text" name="email" class="fields"/>

        </div>

        <div class="options">
            <div class="rememberme">
                <input id="rememberme" type="checkbox"> <label
                    for="rememberme">Remember me</label>
            </div>

        </div>
        <div class="loginbtn">
            <input type="submit" name="register" class="inputs" value="Register" />
        </div>

    </form>
</div>
<br />
</body>
</html>
