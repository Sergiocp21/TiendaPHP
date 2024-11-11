<?php
session_start();
class ControladorCarrito
{



    public function addProducto($id_Producto, $id_Cliente)
    {

        $_SESSION['Carrito']->anadirProducto($id_Producto); ;

    }
    public function removeProducto($id_Producto){
        $_SESSION['Carrito']->eliminarProducto($id_Producto);
    }



}





