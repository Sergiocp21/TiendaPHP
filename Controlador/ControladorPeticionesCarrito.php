<?php
require_once "ControladorCarrito.php";

session_start();

$ControladorCarrito = new ControladorCarrito();


if (isset($_POST["Carrito"])) {
    if ($_POST["accion"] == "Eliminar del carrito") {
        $idProducto = $_POST["id_producto"];
        $ControladorCarrito->deleteProduct($idProducto);
        header("Location: ..//Vista/vistaCarrito.php");
    } else if ($_POST["accion"] == "agregar") {

        $idProducto = $_POST["idProducto"];
        $ControladorCarrito->addProduct($idProducto);
        header("Location: ../Vista/detalleProducto.php?idProducto=$idProducto&exito=Producto añadido correctamente al carrito"); //Al mismo producto
    }
}

if ($_POST["accion"] == "Vaciar carrito") {
    if (isset($_SESSION["Carrito"])) {
        unset($_SESSION["Carrito"]);
    }
    header("Location: ../Vista/vistaCarrito.php");
}