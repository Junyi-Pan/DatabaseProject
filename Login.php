<?php
session_start();
require_once('connect.php');

try
{

    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            // CHANGED STUFF
            $username = $_POST["username"];
            $password = $_POST["password"];
            //salt password for added security
            $saltPass = "483ythgfunwejksvbsm3q".$password."7dnfr234fes";
            // makes scrambled password
            $hashPass = hash('sha512', $saltPass);
            // CHANGED STUFF END
            
            $query = "SELECT * FROM user WHERE username = :username AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $username,
                    'password'     =>     $hashPass
                )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:index.php");
            }
            else
            {
                $message = '<label>Incorrect Username/Password</label>';
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <header>Login</header>
    <form method="post">
        
        <div class="inputs">
            <label>Username</label>
            <input type="text" name="username" class="form-control" />
            <br></br>
            <label>Password</label>
            <input type="password" name="password" class="form-control" />
            <br></br>
        </div>

        <div class="options">
            <div class="rememberme">
                <input id="rememberme" type="checkbox"> <label
                        for="rememberme">Remember me</label>
            </div>
            <div class="forgotpassword">
                <a href="forgotPassword.php">Forgot Password</a>
            </div>
        </div>
        <div class="loginbtn">
            <input type="submit" name="login" class="inputs" value="Login" />
        </div>

    </form>
</div>
<br />
</body>
</html>
