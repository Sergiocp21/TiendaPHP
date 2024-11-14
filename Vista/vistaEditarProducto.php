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
            <li><a href="AnadirProducto.php">Añadir Producto</a></li>
            <li><a href="vistaEditarProducto.php">Modificar Producto</a></li>
            <li><a href="FormularioEliminar.php">Eliminar Producto</a></li>
            <li><a href="vistaCarrito.php">Carrito</a></li>
            <li><a href="InfoCliente.php">Cliente</a> </li>
        </ul>
        </li>
        </ul>
    </nav>
    <h1>Editar Producto</h1>
    <?php //En la url vendrá el ID del producto a editar 
    if (isset($_GET['idProducto'])) {
        if ($controladorProducto->getProductById($_GET['idProducto']) != null) { //EL producto existe
            $producto = $controladorProducto->getProductById($_GET['idProducto']);

            echo "
            <img src='" . $producto->getImagen() . "' alt= '" . $producto->getNombre() . "'>
         <form action='../Controlador/ControladorAnadirEditarYEliminarProducto.php' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='idProducto' value='" . $_GET['idProducto'] . "'>
            <label for='nombre'>Nombre:</label>
            <input type='text' id='nombre' name='nombre' value='" . $producto->getNombre() . "' required><br><br>
            <label for='descripcion'>Descripción:</label>
            <input type='text' id='descripcion' name='descripcion' value='" . $producto->getDescripcion() . "' required><br><br>
            <label for='precio'>Precio:</label>
            <input type='number' id='precio' name='precio' value='" . $producto->getPrecio() . "' required><br><br>
            <label>Imagen:</label>
            <input type='file' id='imagen' name='imagen' value='" . $producto->getImagen() . "'><br><br>
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