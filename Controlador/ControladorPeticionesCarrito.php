<?php
require_once "ControladorCarrito.php";

session_start();

$ControladorCarrito = new ControladorCarrito();


if (isset($_POST["Carrito"])) {
    if ($_POST["accion"] == "Eliminar del carrito") {
        $idProducto = $_POST["id_producto"];
        $ControladorCarrito->removeProducto($idProducto);
        header("Location: ..//Vista/vistaCarrito.php");
    } else if ($_POST["accion"] == "agregar") {

        $idProducto = $_POST["idProducto"];
        $ControladorCarrito->addProducto($idProducto);
        //header("Location: ..//Vista/vistaCarrito.php");
    }
}

if ($_POST["accion"] == "Vaciar carrito") {
    unset($_SESSION["Carrito"]);
    echo "Se han eliminado todos los productos del carrito";
    header("Location: ..//Vista/vistaCarrito.php");
}