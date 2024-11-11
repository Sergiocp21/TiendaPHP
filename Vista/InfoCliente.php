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
        <li><a href="index.php">Inicio</a></li>
        <li><a href="FormularioModificar.html">Modificar Producto</a></li>
        <li><a href="FormularioEliminar.html">Eliminar Producto</a></li>
        <li><a href="FormularioAñadir.html">Añadir Producto</a></li>
        <li class="dropdown">
            <a href="#">Cliente</a>
            <ul class="dropdown-content">
                <li><a href="FormularioAñadirCliente.html">Añadir Cliente</a></li>
                <li><a href="FormularioModificarCliente.html">Modificar Cliente</a></li>
                <li><a href="FormularioEliminarCliente.html">Eliminar Cliente</a></li>
                <li><a href="FormularioVisualizarClientes.html">Visualizar Clientes</a></li>
            </ul>
        </li>
    </ul>
</nav>

<form action="../Controlador/ControladorPeticionesInicioYRegistro.php" method="post">

    <label for="nombre">Nombre:</label>

    <?php
    if (isset($_SESSION['cliente'])) {
        print_r($_SESSION['cliente']->getNombre());
    } else {
        header("Location: ../Vista/VistaInicioSesion.php?error=Usuario o contrasena incorrectos");
    }
    ?>

    <br><label for="apellido">Apellido:</label>
    <?php
    print_r($_SESSION['cliente']->getApellido());
    ?>

    <br><label for="nickname">Nickname:</label>
    <?php
    print_r($_SESSION['cliente']->getNickname());
    ?>

    <br><label for="telefono">Telefono:</label>
    <?php
    print_r($_SESSION['cliente']->getTelefono());
    ?>

    <br><label for="domicilio">Domicilio:</label>
    <?php
    print_r($_SESSION['cliente']->getDomicilio());
    ?>

    <br>
    <br>
    <input type="submit" value="Cerrar Sesion" name="registroIniciar">

</form>
</body>

<footer class="footer">
    <p> Tienda Online - Sergio Carvajal y  Oscar Lara</p>
</footer>


</html>
