<?php 

    require 'database.php';

    $message ='';

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            $message='Succesfully created new user';
        }else{
            $message='Sorry there must have been an issues creating your account ';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
</head>
<body>
    <?php 
        require 'parciales/header.php'
    ?>

    <?php 
        if(!empty($message)):
    ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Register</h1>
    <span>or <a href='login.php'>Login</a></span>

    <form action ="register.php" method="POST">
    <input type='text' name='email' placeholder='Enter your email'>
    <input type='password' name='password' placeholder='Enter your password'>
    <input type='password' name='confirm_password' placeholder='Confirm your password'>
    <input type='submit' value='Send'>
</form>
</body>
</html>