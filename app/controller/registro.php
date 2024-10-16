<?php
require_once "../config/conexion.php";
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: ./index.php");
}

if ($_POST) {
    if (isset($_POST['usuario']) && !empty($_POST['usuario']) && 
        isset($_POST['pass']) && !empty($_POST['pass'])) {

        $usuario = $_POST['usuario'];
        $passw = $_POST['pass'];

        // Verificar si el usuario ya existe
        $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            echo json_encode([0, "El usuario ya existe"]);
            exit;
        }

        // Inserción de nuevo usuario
        $insercion = $conexion->prepare("INSERT INTO t_usuario (usuario, password, rol) VALUES(:usuario, :pass, 'user')");
        
        $insercion->bindParam(':usuario', $usuario);
        $insercion->bindParam(':pass', $passw); // Almacenar contraseña de forma segura

        $insercion->execute();

        if ($insercion) {
            echo json_encode([1, "Usuario registrado correctamente"]);
        } else {
            echo json_encode([0, "Usuario NO registrado"]);
        }
    } else {
        echo json_encode([0, "No puedes dejar campos vacíos"]);
    }
}
?>
