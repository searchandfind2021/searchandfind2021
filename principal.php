<?php 
session_start();
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
$records = $conn->prepare("SELECT image,info,price, description, location FROM apartment");
$records->bindParam(':image', $_POST['image']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
</head>
<body>
<?php require 'parciales/header.php' ?>
<form action="login.php" method="POST">
      <input type="submit" value="PublicaGratis">
      <input type="submit" value="Inicia Sesion">
    </form>
</body>
</html>