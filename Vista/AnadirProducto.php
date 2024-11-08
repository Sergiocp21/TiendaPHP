<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once"../Modelo/DTOCliente.php";
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
        <li><a href="index.html">Inicio</a></li>
        <li><a href="AnadirProducto.php">Añadir Producto</a></li>
        <li><a href="FormularioModificar.php">Modificar Producto</a></li>
        <li><a href="FormularioEliminar.php">Eliminar Producto</a></li>
        <li><a href="carrito.php">Carrito</a></li>
        <li><a href="InfoCliente.php">Cliente</a> </li>
    </ul>
    </li>
    </ul>
</nav>

<h2>Añadir Producto</h2>
<form action="../Controlador/ControladorProducto.php.php" method="post">

    <label for="nombre" >Nombre</label>
    <input type="text" name="nombre">

    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion">

    <label for="precio">Precio en €</label>
    <input type="text" name="nickname">

    <? //<input type="file" id="file-input" accept=".png"> <br><br>?>

    <input type="submit" value="Introducir en bddd" name="introducir">
</form>

<?php
if (isset($_GET['errores'])) {
    echo "<p style='color:red'>" . $_GET['errores'] . "</p>";
}
?>

<footer class="footer">
    <p> Tienda Online - Sergio Carvajal y  Oscar Lara</p>
</footer>

</body>
</html>
