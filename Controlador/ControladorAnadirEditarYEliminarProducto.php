<?php
require_once './ControladorProducto.php';
require_once '../Controlador/ControlSubidaArchivo.php';
session_start();
$controladorProducto = new ControladorProducto();
$accion = $_REQUEST['gestionProductos'];


function comprobar($campo)
{
    $controladorProducto = new ControladorProducto();
    switch ($campo) {
        case "nombreAñadir":
            if ($_REQUEST['nombre'] == "" || $controladorProducto->getProductByName($_REQUEST['nombre']) != null) {

                return false;
            } else {
                return true;
            }

        case "nombreEditar":
            $nombre = $_REQUEST['nombre'];
            $idProducto = $_REQUEST['idProducto'];
            $productoExistente = $controladorProducto->getProductByName($nombre);

            // Si el nombre está vacío o el nombre ya existe para otro producto, devuelve false
            if ($nombre == "" || ($productoExistente != null && $productoExistente->getId() != $idProducto)) {
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
    case "Anadir Producto":
        //comprueba que estan todos los datos introducidos
        if (isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['precio']) && isset($_FILES['imagen'])) {
            //hacemos las validaciones correspondientes y si no se cumplen te vuelve a la pantalla de anadir
            if (comprobar("nombreAñadir")) {
                if (comprobar("descripcion")) {
                    if (comprobar("precio")) {
                        $controladorProducto->addProduct($_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['precio'], null);
                        header("Location: ../Vista/AnadirProducto.php?exito= Producto anadido correctamente");
                    } else {
                        $errores .= "El precio del producto no es valido ";
                    }
                } else {
                    $errores .= "La descripcion del producto no es valido ";
                }
            } else {
                $errores .= "El nombre del producto no es valido o ya hay un nombre igual en la base de datos";
            }
        }
        if ($errores != "") {
            header("Location: ../Vista/AnadirProducto.php?" . "error=" . $errores);
        }

        break;

    case "Editar Producto":
        if (isset($_REQUEST['idProducto']) && isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['precio']) && isset($_FILES['imagen'])) {
            if (comprobar("nombreEditar")) {
                if (comprobar("descripcion")) {
                    if (comprobar("precio")) {
                        $controladorProducto->updateProduct($_REQUEST['idProducto'], $_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['precio'], null);
                        header("Location: ../Vista/VistaEditarProducto.php?idProducto=" . $_REQUEST['idProducto'] . "&exito=Producto editado correctamente");
                    } else {
                        $errores .= "El precio debe se un número positivo";
                    }
                } else {
                    $errores .= "Rellena la descripción";
                }
            } else {
                $errores .= "El nombre del producto no es valido o ya hay un nombre igual en la base de datos";
            }
        } else {
            $errores .= "Error al editar el producto";
        }

        if ($errores != "") {
            header("Location: ../Vista/VistaEditarProducto.php?idProducto=" . $_REQUEST['idProducto'] . "&error=" . $errores);
        }
        break;

    case "Eliminar Producto":
        if (isset($_REQUEST['idProducto'])) {
            $controladorProducto->deleteProduct($_REQUEST['idProducto']);
            header("Location: ../Vista/vistaProductos.php?exito=Producto eliminado correctamente");
        } else {
            header("Location: ../Vista/vistaProductos.php?error=Error al eliminar el producto");
        }
        break;
}