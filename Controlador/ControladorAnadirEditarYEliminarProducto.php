<?php
require_once './ControladorProducto.php';
session_start();
$controladorProducto = new ControladorProducto();
$accion = $_REQUEST['gestionProductos'];


function comprobar($campo)
{

    switch ($campo) {
        case "nombre":
            if ($_REQUEST['nombre'] == "") {
                return false;
            } else {
                return true;
            }
        case "descripcion":
            if ($_REQUEST['descripcion'] == "") {
                return false;
            } else {
                return true;
            }

        case "precio":
            if ($_REQUEST['precio'] <= 0) {
                return false;
            } else {
                return true;
            }
    }
}

$errores = "";

switch ($accion) {
    case "Añadir Producto":
        //comprueba que estan todos los datos introducidos
        if (isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['precio'])) {
            //hacemos las validaciones correspondientes y si no se cumplen te vuelve a la pantalla de añadir
            if (comprobar("nombre")) {
                if (comprobar("descripcion")) {
                    if (comprobar("precio")) {
                        $controladorProducto->addProduct($_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['precio'], null);
                        header("Location: ../Vista/AnadirProducto.php?exito = Producto añadido correctamente");
                    } else {
                        header("Location: ../Vista/AnadirProducto.php?Error = No has introducido el precio correctamente");
                    }
                } else {
                    header("Location: ../Vista/AnadirProducto.php?Error = No has introducido la descripcion correctamente");
                }
            } else {
                header("Location: ../Vista/AnadirProducto.php?Error = No has introducido el nombre correctamente");
            }
        } else {
            header("Location: ../Vista/AnadirProducto.php?Error = No has introducido todos los datos");
        }
        break;

    case "Editar Producto":
        if (isset($_REQUEST['idProduct']) && isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['precio'])) {
            if (comprobar("nombre")) {
                if (comprobar("descripcion")) {
                    if (comprobar("precio")) {
                        $controladorProducto->updateProduct($_REQUEST['idProduct'], $_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['precio'], null);
                        header("Location: ../Vista/VistaEditarProducto.php?idProduct=" . $_REQUEST['idProduct'] . "&exito=Producto editado correctamente");
                    } else {
                        $errores .= "El precio debe se un número positivo";
                    }
                } else {
                    $errores .= "Rellena la descripción";
                }
            } else {
                $errores .= "El nombre no puede estar vacío";
            }
        } else {
            $errores .= "Error al editar el producto";
        }

        if ($errores != "") {
            header("Location: ../Vista/VistaEditarProducto.php?idProduct=" . $_REQUEST['idProduct'] . "&error=" . $errores);
        }
        break;
}