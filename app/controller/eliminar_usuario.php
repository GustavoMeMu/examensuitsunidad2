<?php
require_once '../config/conexion.php';
session_start();

$id_producto = $_POST['idInput'];

$eliminar = $conexion->prepare("DELETE FROM t_productos WHERE id_producto = :id_producto");
$id = $id_producto;
$eliminar->bindParam(':id_producto',$id);
$eliminar->execute();

if ($eliminar) {
    echo json_encode([1,'Producto eliminado correctamente']);
} else {
    echo json_encode([0,'Producto NO eliminado correctamente']);
}

?>