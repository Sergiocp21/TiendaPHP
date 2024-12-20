<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once("../Modelo/Carrito.php");
    require_once("../Controlador/ControladorProducto.php");
    require_once("../Controlador/ControladorCarrito.php");
    session_start();

    $controladorProducto = new ControladorProducto();
    $controladorCarrito = new ControladorCarrito();
    $costeCarrito = 0;
    ?>
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

    <h2>Carrito</h2>
    <section class="productos">
        <?php
        if (isset($_SESSION['Carrito'])) {
            $producto = $controladorCarrito->getIdProducts();
            if (count($producto) > 0) {
                $costeCarrito = 0;
                foreach ($producto as $idProducto) {
                    $producto = $controladorProducto->getProductById($idProducto);

                    echo "
                    <div class='producto'>
                    <a href='../Vista/VistaDetalleProducto.php?idProducto=" . $idProducto . "'>
                    <img src='" . $producto->getImagen() . "' alt='Imagen del producto'>
                    <p>" . $producto->getNombre() . "
                    <span>" . $producto->getPrecio() . "€</span>
                    ";
                    $costeCarrito += $producto->getPrecio();
                    if ($producto->getPrecio() <= 10) {
                        echo "<span>¡Oferta!</span>";
                    } else if ($producto->getPrecio() > 200) {
                        echo "<span>Producto de calidad</span>";
                    }

                    echo "<form action='../Controlador/ControladorPeticionesCarrito.php' method='post'>
                    
                    <input type='hidden' name='id_producto' value='" . $idProducto . "'>
                    
                    <input type='submit' name='accion' value='Eliminar del carrito'>
                    </form>
                    </a>
                    </div>
                    
                    ";
                }

            } else {
                echo "<p>El carrito esta vacío</p>";
            }
        }

        ?>
    </section>

    <?php
    if ($costeCarrito > 0) {
        echo "<span>Coste total: " . $costeCarrito . "€</span>";
    }
    ?>
    <form action='../Controlador/ControladorPeticionesCarrito.php' method='post'>
        <input type='submit' name='accion' value='Vaciar carrito'>
    </form>

    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>