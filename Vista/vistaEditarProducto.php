<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Vista/styles.css">
    <?php
    require_once('../Controlador/ControladorProducto.php');
    require_once('../Modelo/DTOProducto.php');
    session_start();
    $controladorProducto = new ControladorProducto();
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
    <h1>Editar Producto</h1>
    <?php //En la url vendrá el ID del producto a editar 
    if (isset($_GET['idProduct'])) {
        if ($controladorProducto->getProductById($_GET['idProduct']) != null) { //EL producto existe
            $productos = $controladorProducto->getProductById($_GET['idProduct']);

            echo "
         <form action='../Controlador/ControladorAnadirEditarYEliminarProducto.php' method='post'>
            <input type='hidden' name='idProduct' value='" . $_GET['idProduct'] . "'>
            <label for='nombre'>Nombre:</label>
            <input type='text' id='nombre' name='nombre' value='" . $productos->getNombre() . "' required><br><br>
            <label for='descripcion'>Descripción:</label>
            <input type='text' id='descripcion' name='descripcion' value='" . $productos->getDescripcion() . "' required><br><br>
            <label for='precio'>Precio:</label>
            <input type='number' id='precio' name='precio' value='" . $productos->getPrecio() . "' required><br><br>
            <input type='submit' value='Editar Producto' name='gestionProductos'>
        </form>";

        }
    }

    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>" . $_GET['error'] . "</p>";
    }
    if (isset($_GET['exito'])) {
        echo "<p style='color:green;'>" . $_GET['exito'] . "</p>";
    }


    ?>

    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>