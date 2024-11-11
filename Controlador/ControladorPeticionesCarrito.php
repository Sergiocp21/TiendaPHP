<?php

session_start();

require_once "ControladorCarrito.php";

if (!isset($_SESSION["Carrito"])) {

    $_SESSION["Carrito"] = [];
}

if (isset($_POST["Carrito"])) {
    if($_POST["accion"] == "eliminar") {
        $indice = $_POST["indice"];
        removeProducto($indice);
        echo "Producto eliminado del carrito";
        header("Location: ..//VistaCarrito.php");
    } else if($_POST["accion"] == "agregar") {

        $idProducto = $_POST["idProducto"];
        $idCliente = $_POST["idCliente"];
    }
}

if($_POST["accion"] == "eliminar_todas") {
    $_SESSION["Carrito"] = [];
    echo "Se han eliminado todos los productos del carrito";
    header("Location: ..//VistaCarrito.php");
}

