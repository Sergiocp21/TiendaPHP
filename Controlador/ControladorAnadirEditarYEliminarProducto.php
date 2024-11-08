<?php
require_once './ControladorProducto.php';
session_start();
$accion = $_REQUEST['gestionProductos'];
$prueba = 0;

//switch para elegir la opcion segun el boton que pulses
switch ($accion) {
    case "Añadir Producto":
        //comprueba que estan todos los datos introducidos
        if (isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['precio'])){
            //hacemos las validaciones correspodientes y si no se cumplen te vuelve a la pantalla de añadir
            if (comprobar("nombre")){
                if (comprobar("descripcion")){
                    if (comprobar("precio")){
                        addProduct($_REQUEST['nombre'], $_REQUEST['descripcion'], $_REQUEST['precio'], null);
                    } else{
                        header("Location: ../Vista/AnadirProducto.php?Error = No has introducido el precio correctamente");
                    }
                } else{
                    header("Location: ../Vista/AnadirProducto.php?Error = No has introducido la descripcion correctamente");
                }
            } else{
                header("Location: ../Vista/AnadirProducto.php?Error = No has introducido el nombre correctamente");
            }
        } else{
            header("Location: ../Vista/AnadirProducto.php?Error = No has introducido todos los datos");
        }

}
