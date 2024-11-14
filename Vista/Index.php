<?php
require_once '../Modelo/DAOProducto.php';
require_once '../Modelo/Carrito.php';
require_once "../Modelo/DTOCliente.php";
require_once '../Controlador/ControladorCliente.php';
$daoProducto = new DAOProducto();


session_start();


if (!isset($_SESSION['cliente'])) {
    header("Location: ../Vista/VistaInicioSesion.php?error=Debes iniciar sesion primero");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="header">
    <h1>TIENDA ONLINE</h1>
</header>

<nav class="navbar">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="vistaCarrito.php">Carrito</a></li>
        <li><a href="InfoCliente.php">Cliente</a></li>
        <li><a href="vistaProductos.php">Productos</a>
        <ul class="submenu">
        <li><a href="AnadirProducto.php">Añadir Producto</a> </li>
        </ul>
        </li>
    </ul>
</nav>

<div>
    <?php
    echo "Bienvenido, " . $_SESSION['cliente']->getNombre();
    ?>
</div>

<h2 align="CENTER">SUPERMERCADO</h2>
<section class="productos">
    <?php
    $productos = $daoProducto->getAllProducts();
    for ($i = 0; $i < 4; $i++) {
        $producto = $productos[$i];
        echo "<a href='../Vista/vistaDetalleProducto.php?idProducto=" . $producto->getId() . "'>";
        echo "<div class='producto'>";

        echo "<img src='" /* $producto->getImagen() */ . "' alt='" . $producto->getNombre() . "'>";
        echo "<p>" . $producto->getNombre() . "</p>";
        if ($producto->getPrecio() <= 10) {
            echo "<span>¡Producto de oferta!</span>";
        } else if ($producto->getPrecio() > 200) {
            echo "<span>¡Producto de calidad!</span>";
        }
        echo "<span> Precio: " . $producto->getPrecio() . "€</span>";

        echo "</div>";
        echo "</a>";
    }
    ?>
</section>

<footer class="footer">
    <p> Tienda Online - Sergio Car
