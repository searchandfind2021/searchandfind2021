<!DOCTYPE html>
<html>

<head>
    <style>
        label {
            display: block;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        .formulario {
            display: block;
            margin: 0 auto;
            width: 510px;
            color: #666666;
            font-family: Arial;
        }

        form {
            margin: 0 auto;
            width: 400px;
        }

        input,
        textarea {
            width: 380px;
            height: 27px;
            background: #666666;
            border: 2px solid #f6f6f6;
            padding: 10px;
            margin-top: 5px;
            font-size: 10px;
            color: #ffffff;
        }

        textarea {
            height: 150px;
        }

        #submit {
            width: 85px;
            height: 35px;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>

    <title>Formulario de contacto</title>
</head>

<body>
    <section name="formulario" enctype="multipart/form-data">
        <form method="POST">
            
            <input type="file" name="image" accept=".pdf,.jpg,.png" multiple />
            <label for="info">informacion:</label>
            <input id="info" type="text" name="info" placeholder="info" required="" />
            <label for="price">price:</label>
            <input id="price" type="number" name="price" placeholder="ejemplo@correo.com" required="" />
            <label for="description">description:</label>
            <textarea id="description" name="description" placeholder="description" required=""></textarea>
            <label for="location">localización:</label>
            <input id="location" type="text" name="location" placeholder="Madrid..." required="" />            
            <label for="name">Nombre Completo:</label>
            <input id="name" type="text" name="name" placeholder="name" required="" />
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" placeholder="prueba@.mail.com" required="" />
            <input id="submit" type="submit" name="enviar" value="Enviar" />

    <?php
        session_start();
        require 'database.php';

        $message ='';

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

        if(isset($_POST['enviar'])){
            $sql = "INSERT INTO apartment (image, info, price, description, location, name, email) VALUES
            (:image, :info, :price, :description, :location, :name, :email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image', $_POST['image']);
            $stmt->bindParam(':info', $_POST['info']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':description', $_POST['description']);
            $stmt->bindParam(':location', $_POST['location']);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':email', $_POST['email']);

    
            if($stmt->execute()){
                $message='Succesfully created new user';
            }else{
                $message='Sorry there must have been an issues creating your account ';
            }
        }
    ?>
    </form>
    </section>
</body>

</html>