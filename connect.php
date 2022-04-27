<?php
$dsn = 'mysql:host=localhost;dbname=movielog';
$username = 'root';
$password = '';
try {
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit();
}
?>