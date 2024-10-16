<?php
session_start();
require_once("../config/dependencias.php");

if (!isset($_SESSION['usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No estás autorizado']);
    exit;
}

$usuario = $_SESSION['usuario'];

echo json_encode([
    'success' => true,
    'usuario' => [
        'nombre' => $usuario['nombre'],
        'apellido' => $usuario['apellido'],
        'email' => $usuario['email'],
    ]
]);
