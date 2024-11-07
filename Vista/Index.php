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
    if (!isset($_SESSION['cliente'])) {
        header("Location: ../Vista/VistaInicioSesion.php?error=Debes iniciar sesion primero");
    } else {
        echo "Bienvenido " . $_SESSION['cliente']->getNombre();
    }
    ?>
</head>
<body>

<header class="header">
  <h1>TIENDA ONLINE</h1>
</header>

<nav class="navbar">
  <ul>
    <li><a href="index.html">Inicio</a></li>
    <li><a href="FormularioModificar.php">Modificar Producto</a></li>
    <li><a href="FormularioEliminar.php">Eliminar Producto</a></li>
    <li><a href="FormularioAñadir.php">Añadir Producto</a></li>
    <li><a href="carrito.php">Carrito</a></li>
    <li><a href="InfoCliente.php">Cliente</a> </li>
      </ul>
    </li>
  </ul>
</nav>

<footer class="footer">
  <p> Tienda Online - Sergio Carvajal y  Oscar Lara</p>
</footer>

</body>
</html>
