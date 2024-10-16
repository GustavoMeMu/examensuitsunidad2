<?php 
$user = "root";
$pass = "";
$server = "localhost";
$nameDB = "escuela";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$nameDB",$user,$pass);
} catch (PDOException $e) {
    die('Conexion fallida: '.$e);
}

?>