<?php 
session_start();
require 'database.php';

if(isset($_SESSION['user_id'])){
$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$user = null;

if(count($results) > 0){
$user = $results;
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Search&Find</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    
</head>
    <body>
        <?php 
        require 'parciales/header.php'
        ?>
        <?php
        if(!empty($user)):
        ?>
        <br>Welcome. <?= $user['email']; ?>
        <br>You are Succesfully Logged In<a href='logout.php'>Logout</a>
        <?php else: ?>
        <h1>Please Login or Register</h1>
            <a href='login.php'>Login</a> or 
            <a href='register.php'>Register</a>    

        <?php endif; ?>
    </body>
</html>