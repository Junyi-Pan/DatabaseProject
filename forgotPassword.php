<?php
require_once('connect.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$sent = null;
if(isset($_POST["email"])){
    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = "INSERT INTO resetPassword(code, email) VALUES(?, ?)";
    $statement = $connect->prepare($query);
    $statement->execute([$code, $emailTo]);
    $count = $statement->rowCount();

    if($count <= 0){
        echo "Error generating unique code";
    }
    $mail = new PHPMailer(true);
    $exception = null;
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'rottenorangeinc@gmail.com';                     //SMTP username
        $mail->Password = 'Database1*';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('rottenorangeinc@gmail.com', 'Rotten Orange Inc');
        $mail->addAddress($emailTo);
        $mail->addReplyTo('rottenorangeinc@gmail.com', 'Rotten Orange Inc');

//    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['PHP_SELF']) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password Code';
        $mail->Body = "Click <a href='$url'>this link</a> to reset your password";
        $mail->send();
        $sent = true;
    } catch (Exception $e) {
        $sent = false;
    }
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
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
    <header>Forgot Password</header>
    <form method="post">
        <br>
        <label>Email</label>
        <div class="inputs">
            <input type="text" name="email" class="fields" />
            <br />
            <?php if(isset($sent)){?>
                <p><?php echo 'Message has been sent';?>
            </p>
            <?php
            }
            else if($sent = false){?>
                <p><?php echo 'Error sending message'; ?></p>
            <?php
            }
            ?>
        </div>

        <div class="loginbtn">
            <input type="submit" name="forgotPass" class="inputs" value="Submit" />
        </div>

    </form>
</div>
<br />
</body>
</html>
