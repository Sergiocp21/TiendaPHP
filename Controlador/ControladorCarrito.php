<?php
session_start();
class ControladorCarrito
{

    public function getIdProducts()
    {
        return $_SESSION['Carrito']->getIdProductos();
    }

    public function addProducto($id_Producto)
    {

        $_SESSION['Carrito']->anadirProducto($id_Producto);

    }
    public function removeProducto($id_Producto)
    {
        $_SESSION['Carrito']->eliminarProducto($id_Producto);
    }


}