<?php
require_once "../Modelo/DTOProducto.php";
require_once "../Modelo/Carrito.php";
session_start();
class ControladorCarrito
{
    private $carrito;
    public function __construct()
    {
        if (!isset($_SESSION['Carrito']) || !is_object($_SESSION['Carrito'])) {
            $_SESSION['Carrito'] = new Carrito($_SESSION['cliente']);

        }
        $this->carrito = $_SESSION['Carrito'];
    }

    public function getIdProducts()
    {
        return $this->carrito->getIdProductos();
    }

    public function addProduct($id_Producto)
    {

        $this->carrito->anadirProducto($id_Producto);

    }
    public function deleteProduct($id_Producto)
    {
        $this->carrito->eliminarProducto($id_Producto);
    }

}