<?php

class Carrito
{

    private $id;
    private $id_cliente;
    private $id_productos;

    public function __construct($id_cliente)
    {
        $this->id_cliente = $id_cliente;
        $this->id_productos = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function getIdProductos()
    {
        return $this->id_productos;
    }

    public function anadirProducto($id_producto)
    {
        array_push($this->id_productos, $id_producto);
    }

    public function eliminarProducto($id_producto)
    {
        unset($this->id_productos[$id_producto]);
    }

}