<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function SelectAll()
    {

        $query = 'SELECT usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.direccion, usuarios.nacimiento, asignaturas.asignatura FROM `usuarios` 
        LEFT JOIN asignaturas ON asignaturas.id = usuarios.asignatura_id
        WHERE rol_id =2';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function find($id)
    {
        $query = 'SELECT * FROM usuarios Where id = ?';
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($nombre, $apellido, $email, $password, $estado, $direccion, $nacimiento, $rol_id, $asignatura_id, $id) // David
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ?, estado = ? ,direccion = ? ,nacimiento = ?, rol_id = ?, asignatura_id = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $apellido, $email, $password, $estado, $direccion, $nacimiento, $rol_id, $asignatura_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = 'DELETE FROM usuarios WHERE id = ?';
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
