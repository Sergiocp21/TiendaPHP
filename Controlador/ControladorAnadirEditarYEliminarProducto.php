<?php
require_once './ControladorProducto.php';
session_start();
$controladorProducto = new ControladorProducto();
$accion = $_REQUEST['gestionProductos'];


function comprobar($campo, $controladorCliente){
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
    case "Añadir Producto":
}
