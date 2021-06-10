<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Search&Find</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    <style>
body {    
    font-family: 'Roboto', sans-serif;
    text-align: center;
    background-color:#D5DBDB;
}

#cabec {
    margin-top:40px;
    background-image:url(venta-apartamentos-ceuta-8.jpg) ;
    height: 500px;
    width:100%;
    background-repeat: cover;
    background-repeat: no-repeat;
}
#texto{
    width:55%;
    padding:4px;
    margin-left:50px;
    text-align: left; 
    
}
img{
    height:200px;
    width:300px;
    margin-right:40px;
    float:right;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    border: 1px solid white; 
    padding:10px;


}
table{
    background: linear-gradient(-90deg, #923C04 , #FDDEBC);
    background-color:#FDDEBC ;
    width: 80%;
    height: 320px;
    margin: 0 auto;
    margin-top:40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    padding:5px;
}
#logo{
    background-image:url(logoSearch.pdf);
    float:left;
    width: 50px;
    height: 50px;
}
.headerLog{   
    float:right;
    
}

input[value="Edit"] {
    padding: 10px;
    color: #fff;
    background: #128465;
    width: 180px;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    margin-top:5px;
    
}

input[value="Delete"] {
    padding: 10px;
    color: #fff;
    background: #F74215;
    width: 180px;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    margin-top:5px;
    
}
input[name="Delete"]:hover {
    background-color:#C5021D ;
}
</style>
</head>
<?php 
        require 'parciales/header.php';
        echo"<div id='logo'>
        </div>";
?>
<body>
        <div id='cabec'>
        <div class="headerLog">                
                </div>
<?php
   /* Llamada a la base de datos */
   require 'database.php';
   session_start();
   $idusers;
   if (isset($_SESSION['user_id'])) {
       $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
       $records->bindParam(':id', $_SESSION['user_id']);
       $records->execute();
       $results = $records->fetch(PDO::FETCH_ASSOC);
   
       $user = null;
   
       if (count($results) > 0) {
           $user = $results;
       }
       $idusers = $_SESSION['user_id'];
   }
    
   

        $con->consulta("SELECT id, image, info,description,price,location,email FROM apartment WHERE idusers = '$idusers'");
  
   while ($fila = $con->extraer_registro()) {
       /*echo"<div id='ficha'>"; */
       echo "<TABLE>
                           <TR>
                           <TD>";
       foreach ($fila as $key => $valor) {
           echo "<div id='texto'>$valor</div>";
           if ($key == 'image') {
               echo "<img src='$valor'>";
           }
            if ($key == 'id' ) {  
                $id = $valor;
            }
       }
       echo "
                           <form method='POST'>
                           <br>
                           <input type='submit' value='Edit' name='Edit'>
                           <input type='submit' value='Delete' name='Delete'>
                           </TD><br><br>
                           </TR> 
                           </TABLE>";
   }

   if(empty($id)){
    echo "<h2 style='color:#FDF9F6 ; text-shadow: 1px 0 5px rgba(0, 0, 0, 1); '>You don't have any posts right now. Please go to post for free</h2>";
    
}
   if(isset($_POST['Delete'])){
    if(empty($id)){
        echo "";
    }else{

        $con->consulta("DELETE FROM apartment WHERE idusers = '$idusers' AND id = '$id'");
    } 
   }

   ?>
