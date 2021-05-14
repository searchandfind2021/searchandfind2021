<?php 
$server = 'localhost';
$username='root';
$password='';
$database='s&f-database';

try{
$conn=new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch(PDOException $e){
    die('Connect failed: '.$e->getMessage());
}
?>