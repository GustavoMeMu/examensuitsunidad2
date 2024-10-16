<?php
require_once '../config/conexion.php';
session_start();

if ($_POST) {
    if (isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

        $usuario = $_POST['usuario'];
        $passw = $_POST['pass'];
        $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $datos = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($datos) {
            // Verifica la contraseña
            if ($datos['password'] == $passw) {
                $_SESSION['usuario'] = $datos;

                // Redirigir según el rol
                if ($datos['rol'] === 'admin') {
                    echo json_encode([1, "Datos de acceso correctos", "index.php"]);
                } elseif ($datos['rol'] === 'user') {
                    echo json_encode([1, "Datos de acceso correctos", "user.php"]);
                } else {
                    echo json_encode([0, "Rol desconocido"]);
                }
            } else {
                echo json_encode([0, "Error en credenciales de acceso"]);
            }
        } else {
            echo json_encode([0, "Información no localizada"]);
        }
    } else {
        echo json_encode([0, "Tienes que completar los datos"]);
    }
}
?>
