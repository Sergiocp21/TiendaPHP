<?php
require_once './ControladorCliente.php';
session_start();
$controladorCliente = new ControladorCliente();
$accion = $_REQUEST['registroIniciar'];


function comprobar($campo, $controladorCliente)
{
    if ($campo == "apellido") { //Nombre y apellido tiene los mismos requisitos
        $campo = "nombre";
    }

    switch ($campo) {
        case "nombre": //Solo caracteres alfanuméricos
            $pattern = "/^[a-zA-Z0-9]+$/";
            return preg_match($pattern, $_REQUEST['nombre']);

        case "password": // Longitud mínima, uso de mayúsculas, minúsculas y números.
            $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/";
            return preg_match($pattern, $_REQUEST['password']);

        case "telefono": //Solo 9 números
            $pattern = "/^[0-9]{9}$/";
            return preg_match($pattern, $_REQUEST['telefono']);

        case "nickname": //No puede estar ya en uso
            if ($controladorCliente->getClienteByNickname($_REQUEST['nickname']) == null) {
                return true;
            } else {
                return false;
            }


    }
}




switch ($accion) {
    case "registro": //Viene de la vista RegistroUsuario
        if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['password']) && isset($_REQUEST['domicilio']) && isset($_REQUEST['telefono']) && isset($_REQUEST['nickname'])) {
            $errores = "";
            if (!comprobar("nombre", $controladorCliente)) {
                $errores .= "El nombre no es válido. <br>";
            }
            if (!comprobar("apellido", $controladorCliente)) {
                $errores .= "El apellido no es válido. <br>";
            }
            if (!comprobar("password", $controladorCliente)) {
                $errores .= "La contraseña no es válida. <br>";
            }
            if (!comprobar("telefono", $controladorCliente)) {
                $errores .= "El teléfono no es válido. <br>";
            }
            if (!comprobar("nickname", $controladorCliente)) {
                $errores .= "El nickname ya está en uso. <br>";
            }
            if ($errores != "") { //Hay algún fallo en los datos introducidos
                header("Location: ../Vista/VistaRegistroClientes.php?errores=$errores");
            } else { //Los datos está bien y se crea el cliente
                $controladorCliente->addCliente($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['nickname'], $_REQUEST['password'], $_REQUEST['telefono'], $_REQUEST['domicilio']);
                $_SESSION['cliente'] = $controladorCliente->getClienteByNickname($_REQUEST['nickname']);
                header("Location: ../Vista/index.php");
            }

        }


        break;

    case "Iniciar Sesion": //Viene de la vista Inicio Sesion
        if (isset($_REQUEST['nickname']) && isset($_REQUEST['password'])) {
            $cliente = $controladorCliente->getClienteByNickname($_REQUEST['nickname']);
            if ($cliente != null && $cliente->getPassword() == $_REQUEST['password']) {
                $_SESSION['cliente'] = $cliente;
                header("Location: ../Vista/index.php");
            } else {
                header("Location: ../Vista/VistaInicioSesion.php?error=Usuario o contrasena incorrectos");
            }
        }

        break;

    case "Cerrar Sesion":

        session_destroy();
        header("Location: ../Vista/VistaInicioSesion.php");


        break;
}