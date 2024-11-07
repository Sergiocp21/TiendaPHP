<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <h1>TIENDA ONLINE</h1>
    </header>

    <br>
    <br>

    <h2>Iniciar Sesión</h2>

    <form action="../Controlador/ControladorPeticionesInicioYRegistro.php" method="POST">
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname">
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        <input type="submit" value="Iniciar Sesion" name="registroIniciar">
    </form>
    <?php

    if (isset($_GET['error'])) {
        echo "<p style='color:red'>" . $_GET['error'] . "</p>";
    }

    ?>
    <p>¿No tienes una cuenta?</p><a href="vistaRegistroClientes.php">Regístrate aquí</a>
    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>