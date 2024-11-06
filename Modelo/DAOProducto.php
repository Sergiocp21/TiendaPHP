<?php

require_once '../DbConfig/Db.php';
require_once '../Modelo/DTOProducto.php';

class DAOProducto
{
    private $db; //Conexión

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    //Obtener todos los productos
    public function getAllProducts()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM productos");
            $stmt->execute();
            $productos = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new DTOProducto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'], $row['id_cliente']);
                $productos[] = $producto;
            }
            return $productos;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //Obtener el producto por su ID
    public function getProductById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $producto = new DTOProducto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'], $row['id_cliente']);
                return $producto;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addProduct(DTOProducto $producto)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO productos (nombre, descripcion, precio, id_cliente) VALUES (:nombre, :descripcion, :precio, :id_cliente)");
            $stmt->execute([
                ':nombre' => $producto->getNombre(),
                ':descripcion' => $producto->getDescripcion(),
                ':precio' => $producto->getPrecio(),
                ':id_cliente' => $producto->getClienteId(),
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //Actualiza un producto
    public function updateProduct(DTOProducto $producto)
    {
        try {
            $stmt = $this->db->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, id_cliente = :id_cliente WHERE id = :id");
            $stmt->execute([
                ':nombre' => $producto->getNombre(),
                ':descripcion' => $producto->getDescripcion(),
                ':precio' => $producto->getPrecio(),
                ':id_cliente' => $producto->getClienteId(),
                ':id' => $producto->getId(),
            ]);
            return true;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //Elimina un producto
    public function deleteProduct($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM productos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}