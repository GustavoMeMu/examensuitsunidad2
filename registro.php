<?php
require_once "./app/config/dependencias.php";
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <link rel="stylesheet" href="<?=CSS."registro.css";?>">
    <title>Página de Registro</title>
</head>
<body class="d-flex justify-content-center align-items-center mt-5 p-3">
    <form action="./registro_vista.php" method="post" class="w-50 p-4 text-center">
        <div class="text-center mb-4 c-user">
            <i class="bi bi-stars fs-1 text-highlight"></i> 
            <h2 class="text d-inline-block mx-2">Página de Registro</h2>
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-person-fill fs-3 text mx-1"></i>
            <input type="text" class="form-control" placeholder="Ingrese su usuario" id="usuario" name="usuario" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-lock-fill fs-3 text mx-1"></i>
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pass" name="pass" value="">
        </div>
        <div class="mt-3 c-button">
            <button type="button" id="btn-registrar" class="btn w-100 text fs-4">Registrar</button>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <p class="text">¿Ya tienes cuenta?</p> 
            <a href="./login.php" class="text mx-2">Inicia sesión aquí</a>
        </div>
    </form>
    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/main.js"></script>
</body>
</html>
