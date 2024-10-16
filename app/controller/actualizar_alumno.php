<?php 
require_once '../config/conexion.php';
session_start();

if (!empty($_POST['nombre_p']) && !empty($_POST['precio_p']) && !empty($_POST['cantidad_p'])) {

    $id_producto = $_POST['idInput'];
    $nombreproducto = $_POST['nombre_p'];
    $precioProducto = $_POST['precio_p'];
    $cantidadProducto = $_POST['cantidad_p'];

    if (is_numeric($precioProducto) && is_numeric($cantidadProducto)) {
        $actualizacion = $conexion->prepare("UPDATE t_productos 
        SET producto = :producto, precio = :precio, cantidad = :cantidad  
        WHERE id_producto = :id_producto");
    
        $producto = $nombreproducto;
        $precio = $precioProducto;
        $cantidad = $cantidadProducto;
        $id = $id_producto;
    
        $actualizacion->bindParam(':producto',$producto);
        $actualizacion->bindParam(':precio',$precio);
        $actualizacion->bindParam(':cantidad',$cantidad);
        $actualizacion->bindParam(':id_producto',$id);
    
        $actualizacion->execute();
    
        if ($actualizacion) {
            echo json_encode([1,"Producto actualizado correctamente"]);
        } else {
            echo json_encode([0,"Producto NO actualizado correctamente"]);
        }
    } else {
        echo json_encode([0,"Solo datos numericos en precio y cantidad"]);
    }

    
} else {
    echo json_encode([0,"Datos incompletos"]);
}

?>