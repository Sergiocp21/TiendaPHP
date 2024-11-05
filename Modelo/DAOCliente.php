<?php

require_once '../DbConfig/Db.php';
require_once './DTOCliente.php';

class DAOCliente
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getAllClientes()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM cliente");
            $stmt->execute();
            $clientes = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new DTOCliente($row['id'], $row['nombre'], $row['apellido'], $row['nickname'], $row['password'], $row['telefono'], $row['domicilio']);
                $clientes[] = $cliente;
            }
            return $clientes;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getClienteById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM cliente WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $cliente = new DTOCliente($row['id'], $row['nombre'], $row['apellido'], $row['nickname'], $row['password'], $row['telefono'], $row['domicilio']);
                return $cliente;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addCliente(DTOCliente $cliente)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO cliente (nombre, apellido, nickname, password, telefono, domicilio) VALUES (:nombre, :apellidos, :nickname, :password, :telefono, :domicilio)");
            $stmt->execute([
                ':nombre' => $cliente->getNombre(),
                ':apellido' => $cliente->getApellido(),
                ':nickname' => $cliente->getNickname(),
                ':password' => $cliente->getTelefono(),
                ':telefono' => $cliente->getDomicilio(),
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateCliente(DTOCliente $cliente)
    {
        try {
            $stmt = $this->db->prepare("UPDATE cliente SET nombre = :nombre, apellido = :apellido, nickname = :nickname, password = :password, telefono = :telefono, domicilio= :domicilio WHERE id = :id");
            $stmt->execute([
                ':nombre' => $cliente->getNombre(),
                ':apellido' => $cliente->getApellido(),
                ':nickname' => $cliente->getNickname(),
                ':password' => $cliente->getPassword(),
                ':telefono' => $cliente->getTelefono(),
                ':domicilio' => $cliente->getDomicilio(),
                ':id' => $cliente->getId(),
            ]);
            return true;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //Elimina un producto
    public function deleteCliente($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM cliente WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}