<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once "../Controlador/ControladorProducto.php";
    session_start();
    ?>
</head>

<body>
    <header class="header">
        <h1>TIENDA ONLINE</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="AnadirProducto.php">Añadir Producto</a></li>
            <li><a href="vistaEditarProducto.php">Modificar Producto</a></li>
            <li><a href="FormularioEliminar.php">Eliminar Producto</a></li>
            <li><a href="vistaCarrito.php">Carrito</a></li>
            <li><a href="InfoCliente.php">Cliente</a> </li>
        </ul>
    </nav>

    <h2>Productos</h2>
    <section class="productos">
        <?php

        $controladorProducto = new ControladorProducto();
        $producto = $controladorProducto->getAllProducts();

        foreach ($producto as $producto) {
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
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>