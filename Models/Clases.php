<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Clases
{
    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function Selectall()
    {
        $query = 'SELECT * FROM `asignaturas` WHERE id;';
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function clases()
    {
        $query = 'SELECT asignaturas.id, asignaturas.asignatura, usuarios.id as profesor,usuarios.nombre, usuarios.apellido, asignaturas.profesor_id FROM `asignaturas` LEFT JOIN usuarios ON usuarios.asignatura_id = asignaturas.id;';
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function register($asignaturas, $user_id)
    {
        $query = "INSERT INTO asignaturas(`asignatura`) VALUES (?)";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignaturas]);
            if ($user_id) {
                $last_id = $this->conexion->lastInsertId();
                $this->AClases($last_id, $user_id);
            }
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function find($asignatura, $profesor)
    {
        $query = "SELECT id FROM asignaturas WHERE asignatura =?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignatura]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);

            if ($result) {

                $asignatura_id = $result['id'];
                $this->update($asignatura_id, $profesor);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function update($asignatura_id, $id)
    {
        $query = "UPDATE usuarios SET asignatura_id = ?  Where id=? ";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignatura_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function AClases($asignaruta_id, $id)
    {
        $query = "UPDATE `usuarios` SET asignatura_id = ?  Where id=? ";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignaruta_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function bringTecher()
    {

        $query = " SELECT usuarios.id AS profesor,usuarios.nombre ,usuarios.apellido, usuarios.asignatura_id FROM `usuarios` WHERE rol_id = 2 and asignatura_id is null;";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = 'DELETE FROM asignaturas WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
