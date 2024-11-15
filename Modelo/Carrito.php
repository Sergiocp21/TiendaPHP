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
        // Busca el índice del producto en el array (si existe)
        $index = array_search($id_producto, $this->id_productos);

        // Si el índice existe, elimina el producto
        if ($index !== false) {
            unset($this->id_productos[$index]);
            // Reindexa el array para mantener los índices consecutivos
            $this->id_productos = array_values($this->id_productos);
            return true;
        }
        return false; // Opcional: retorna false si no encuentra el producto
    }


}