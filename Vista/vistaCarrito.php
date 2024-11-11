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
    ?>
</head>

<body>
    <header class="header">
        <h1>TIENDA ONLINE</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="AnadirProducto.php">Añadir Producto</a></li>
            <li><a href="FormularioModificar.php">Modificar Producto</a></li>
            <li><a href="FormularioEliminar.php">Eliminar Producto</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="InfoCliente.php">Cliente</a> </li>
        </ul>
    </nav>

    <h2>Carrito</h2>
    <section class="productos">
        <?php
        if (isset($_SESSION['Carrito'])) {
            $productos = $controladorCarrito->getIdProducts();
            if (count($productos) > 0) {
                $carrito = $_SESSION['Carrito'];
                foreach ($productos as $idProducto) {
                    $producto = $controladorProducto->getProductById($idProducto);
                    echo "<div class='producto'>
                
                    <p>Nombre = " . $producto->getNombre() . "
                    <!--Imagen-->
                    
                    <form action='../Controlador/ControladorPeticionesCarrito.php' method='post'>
                    
                    <input type='hidden' name='id_producto' value='" . $idProducto . "'>
                    
                    <input type='submit' name='accion' value='Eliminar del carrito'>
                    </form>
                    
                    </div>
                    ";
                }
            } else {
                echo "<p>El carrito esta vacío</p>";
            }
        }

        ?>
    </section>

    <form action='../Controlador/ControladorPeticionesCarrito.php' method='post'>
        <input type='submit' name='accion' value='Vaciar carrito'>
    </form>

    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>