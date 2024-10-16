<?php
require_once '../config/conexion.php';
session_start();

if (isset($_POST['nombre_p']) && !empty($_POST['nombre_p']) && 
    isset($_POST['precio_p']) && !empty($_POST['precio_p']) && 
    isset($_POST['cantidad_p']) && !empty($_POST['cantidad_p'])) {

    $nombreProducto = $_POST['nombre_p'];
    $precioProducto = $_POST['precio_p'];
    $cantidadProducto = $_POST['cantidad_p'];

    if (is_numeric($precioProducto) && is_numeric($cantidadProducto)) {
        $insercion = $conexion->prepare("INSERT INTO t_productos (producto,precio,cantidad) 
                                         VALUES(:producto,:precio,:cantidad)");
        $producto = $nombreProducto;
        $precio = $precioProducto;
        $cantidad = $cantidadProducto;
    
        $insercion->bindParam(':producto',$producto);
        $insercion->bindParam(':precio',$precio);
        $insercion->bindParam(':cantidad',$cantidad);
    
        $insercion->execute();
        
        if ($insercion) {
            echo json_encode([1,"Producto registrado"]);
        } else {
            echo json_encode([0,"Producto NO registrado"]);
        }
    } else {
        echo json_encode([0,"Solo datos numericos en precio y cantidad"]);
    }

} else {
    echo json_encode([0,"No puedes dejar campos vacios"]);
}

?>