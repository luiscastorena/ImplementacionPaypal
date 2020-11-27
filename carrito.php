<?php
session_start();
$mensaje = "";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {

        case 'Agregar':
            if (is_numeric($_POST['id'])) {
                $id = $_POST['id'];
            } 
            if (is_string($_POST['nombre'])) {
                $nombre = $_POST['nombre'];
            }
            if (is_numeric($_POST['precio'])) {
                $precio = $_POST['precio'];
            } 
            if (is_numeric($_POST['cantidad'])) {
                $cantidad = $_POST['cantidad'];
            } 
            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $id,
                    'Nombre' => $nombre,
                    'Precio' => $precio,
                    'Cantidad' => $cantidad
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje="Listo. Agregado.";

            } else {

                $idProductos=array_column($_SESSION['CARRITO'],'ID');

                if(in_array($id,$idProductos)){
                    echo "<script> alert('El producto ya ha sido agregado al carrito.') </script>";
                    $mensaje=" ";
                }else{

                    $NumeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $id,
                        'Nombre' => $nombre,
                        'Precio' => $precio,
                        'Cantidad' => $cantidad
                    );
                    $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $mensaje="Listo. Agregado.";
    
                }

            }
            break;

            case 'Eliminar':
                if (is_numeric($_POST['id'])) {
                    $id = $_POST['id'];
                    
                    foreach($_SESSION['CARRITO'] as $i =>$producto){
                        if($producto['ID']==$id){
                            unset($_SESSION['CARRITO'][$i]);
                            echo "<script> Elemento eliminado. </script>";
                            
                        }
                    }
                } 
            break;
    }
}
