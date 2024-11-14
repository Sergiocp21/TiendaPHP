<?php
require_once '../Modelo/DAOProducto.php';
require_once '../Modelo/Carrito.php';
require_once "../Modelo/DTOCliente.php";
require_once '../Controlador/ControladorCliente.php';
require_once "../Controlador/ControladorCarrito.php";
$daoProducto = new DAOProducto();
$producto = $daoProducto->getProductById($_REQUEST["idProducto"]);


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
    >>>>>>> cca0ab6d5d5164fb958919499a2110176718571d

    <h1>Nombre: <?php echo htmlspecialchars($producto->getNombre()); ?></h1>
    <h3>Descripcion: <?php echo htmlspecialchars($producto->getDescripcion()); ?></h3>
    <h3>Precio: <?php echo htmlspecialchars($producto->getPrecio()); ?></h3>
    <?php echo "<img src='" . $producto->getImagen() . "' alt='Imagen del producto'>"; ?>
    <br><br>




    <form action="../Controlador/ControladorPeticionesCarrito.php" method="post">
        <input type="hidden" name="idProducto" value="<?php echo htmlspecialchars($producto->getId()); ?>">


        <input type="submit" value="Comprar" name="accion">

    </form>

    <form action="../Controlador/ControladorAnadirEditarYEliminarProducto.php" method="post">
        <input type="hidden" name="idProducto" value="<?php echo htmlspecialchars($producto->getId()); ?>">

        <input type="submit" value="Editar Producto" name="gestionProductos">

        <input type="submit" value="Eliminar Producto" name="gestionProductos">

    </form>

    <?php
    if (isset($_GET['exito'])) {
        echo "<p style='color: green'>" . $_GET['exito'] . "</p>'>";
    }
    ?>


    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>