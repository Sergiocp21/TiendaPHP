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

    <h2>Registro</h2>
    <form action="../Controlador/ControladorPeticionesInicioYRegistro.php" method="post">

        <label for nombre>Nombre</label>
        <input type="text" name="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido">

        <label for="nickname">Nickname</label>
        <input type="text" name="nickname">

        <label for="password">Contraseña</label>
        <input type="password" name="password">

        <label for="telefono">Telefono</label>
        <input type="text" name="telefono">

        <label for="domicilio">Domicilio</label>
        <input type="text" name="domicilio">

        <input type="submit" value="registro" name="registroIniciar">
    </form>

    <p>¿Ya tienes una cuenta?</p><a href="vistaInicioSesion.php">Inicia sesion</a>

    <?php
    if (isset($_GET['errores'])) {
        echo "<p style='color:red'>" . $_GET['errores'] . "</p>";
    }
    ?>

    <footer class="footer">
        <p> Tienda Online - Sergio Carvajal y Oscar Lara</p>
    </footer>
</body>

</html>