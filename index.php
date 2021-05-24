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
            <a href="update.php"><input type="submit" value="PublicaGratis"></a>
                
                    
          
                <a href="login.php">
                    <input type="submit" value="Inicia Sesion"></a> 

        <?php endif; ?>
    </body>
</html>



<?php 

$con->consulta("SELECT * FROM apartment");
while ($fila = $con->extraer_registro()) {
    echo "<hr>";
    foreach ($fila as $key => $valor) {
        echo "$valor<br>";
        if ($key == 'image') {
            echo "<img src='$valor'>";
        }
    }
}


?>
