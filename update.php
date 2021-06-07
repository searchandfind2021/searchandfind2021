<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    <style>
body {
    margin: 10px;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    background-color:#D5DBDB ;
}

input[type="text"],
input[type="password"],
input[type="number"] {
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 0px auto;
}

input[value="Send"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 320px;
    margin: 200px auto;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
}
#cabec {
    margin-top:40px;
    background-image:url(venta-apartamentos-ceuta-8.jpg) ;
    height: 400px;
    width:100%;
    background-repeat: cover;
    background-repeat: no-repeat;
}


</style>
    
</head>
<?php 
        require 'parciales/header.php'
    ?>
<body>
<div id='cabec'>

    <section name="formulario" enctype="multipart/form-data">
        <form method="POST">
            
            
            <input id="info" type="text" name="info" placeholder="Enter your informacion" required="" /><br>
            <input id="price" type="text" name="price" placeholder="Enter your price" required="" /><br>
            <input id="description" type="text" name="description" placeholder="Enter your description" required=""/><br>
            <input id="location" type="text" name="location" placeholder="Enter your location" required="" /><br>           
            <input id="name" type="text" name="name" placeholder="Enter your name" required="" /><br>
            <input id="email" type="text" name="email" placeholder="prueba@.mail.com" required="" /><br>
            <input type="file" name="image" accept=".pdf,.jpg,.png" multiple/><br>
            <input id="submit" type="submit" name="Send" value="Send" />

    <?php

    require 'database.php';

   

        if(isset($_POST['Send'])){
            $image = $_POST['image'];
            $info = $_POST['info'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $email = $_POST['email'];
            $idusers = 1;

            $con->consulta("INSERT INTO apartment (image, info, description, price, location, email, idusers) VALUES ('$image','$info','$description','$price', '$location', '$email', '$idusers')");

        }
    ?>
    </form>
    </section>
    </div>
</body>

</html>