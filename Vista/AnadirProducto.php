<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once "../Modelo/DTOCliente.php";
    require_once '../Controlador/ControladorCliente.php';
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
            <li><a href="vistaCarrito.php">Carrito</a></li>
            <li><a href="InfoCliente.php">Cliente</a></li>
            <li><a href="vistaProductos.php">Productos</a>
                <ul class="submenu">
                    <li><a href="AnadirProducto.php">Anadir Producto</a> </li>
                </ul>
            </li>
        </ul>
    </nav>

    <h2>Añadir Producto</h2>
    <form action="../Controlador/ControladorAnadirEditarYEliminarProducto.php" method="post"
        enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>

        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" required>

        <label for="precio">Precio en €</label>
        <input type="text" name="precio" required>

        <label for='imagen'>Imagen: </label>
        <input type='file' id='imagen' name='imagen' required><br><br>

        <input type="submit" value="Añadir Producto" name="gestionProductos">
        <?php
        if (isset($_GET['error'])) {
            echo "<p style='color:red'>" . $_GET['error'] . "</p>";
        }

        if (isset($_GET['exito'])) {
            echo "<p style='color:green'>" . $_GET['exito'] . "</p>";
        }
        ?>
    </form>

    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>

</body>

</html>