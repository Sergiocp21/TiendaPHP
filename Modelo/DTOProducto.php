<?php

class DTOProducto
{

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $clienteId;

    public function __construct($id, $nombre, $descripcion, $precio, $clienteId)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->clienteId = $clienteId;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getClienteId()
    {
        return $this->clienteId;
    }
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
    }
}