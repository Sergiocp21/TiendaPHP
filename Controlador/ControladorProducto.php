<?php
require '../Modelo/DAOProducto.php';


class ControladorProducto
{
    private $daoProducto;

    public function __construct()
    {
        $this->daoProducto = new DAOProducto();
    }

    //Devuelve todos los productos
    public function getAllProducts()
    {
        return $this->daoProducto->getAllProducts();
    }

    //Devuelve el producto con el id dado
    public function getProductById($id)
    {
        return $this->daoProducto->getProductById($id);
    }

    public function getProductByName($nombre)
    {
        return $this->daoProducto->getProductByName($nombre);
    }

    //Añade un producto
    public function addProduct($nombre, $descripcion, $precio, $clienteId)
    {
        $producto = new DTOProducto(null, $nombre, $descripcion, $precio, $clienteId);

        return $this->daoProducto->addProduct($producto);
    }

    //Actualiza un producto dado todos sus valores
    public function updateProduct($id, $nombre, $descripcion, $precio, $clienteId)
    {
        $producto = new DTOProducto($id, $nombre, $descripcion, $precio, $clienteId);

        return $this->daoProducto->updateProduct($producto);
    }

    public function deleteProduct($id)
    {
        return $this->daoProducto->deleteProduct($id);
    }
}