<?php
require_once "ControladorCarrito.php";

session_start();

$ControladorCarrito = new ControladorCarrito();


if (isset($_SESSION["Carrito"])) {
    echo "Dentro";
    switch ($_POST["accion"]){
        case "Comprar":
            $idProducto = $_POST["idProducto"];
            $ControladorCarrito->addProduct($idProducto);
            header("Location: ../Vista/VistaDetalleProducto.php?idProducto=$idProducto&exito=Producto anadido correctamente al carrito"); //Al mismo producto

        break;

        case "Eliminar del carrito":
            $idProducto = $_POST["id_producto"];
            $ControladorCarrito->deleteProduct($idProducto);
            header("Location: ../Vista/vistaCarrito.php");

        break;
    }
}

if ($_POST["accion"] == "Vaciar carrito") {
    if (isset($_SESSION["Carrito"])) {
        unset($_SESSION["Carrito"]);
    }
    header("Location: ../Vista/vistaCarrito.php");
}