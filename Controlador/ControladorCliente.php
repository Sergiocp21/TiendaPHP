<?php
require '../Modelo/DAOProducto.php';
class ControladorCliente
{
    private $daoCliente;

    public function __construct()
    {
        $this->daoCliente = new DAOCliente();
    }

    public function getAllClientes()
    {
        return $this->daoCliente->getAllClientes();
    }

    public function getClienteById($id)
    {
        return $this->daoCliente->getClienteById($id);
    }

    public function addCLiente($nombre, $apellido, $nickname, $password, $telefono, $domicilio){
        $cliente = new DTOCliente(null, $nombre, $apellido, $nickname, $password, $telefono, $domicilio);

        return $this->daoCliente->addCliente($cliente);
    }

    public function updateCliente($id, $nombre, $apellido, $nickname, $password, $telefono, $domicilio)
    {
        $cliente = new DTOCliente($id, $nombre, $apellido, $nickname, $password, $telefono, $domicilio);

        return $this->daoCliente->updateCliente($cliente);
    }

    public function deleteCliente($id)
    {
        return $this->daoCliente->deleteCliente($id);
    }
}