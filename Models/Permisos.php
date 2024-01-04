<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Permisos
{

    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function select()
    {

        $query = "SELECT usuarios.id, usuarios.email,  usuarios.estado, roles.rol  FROM `usuarios` 
        LEFT JOIN roles ON roles.id = usuarios.rol_id";


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updates($email, $estado, $rol_id,  $id)
    {
        $query = "UPDATE usuarios SET `email` = ? , `estado` = ? , `rol_id` = ? WHERE `id` = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $estado, $rol_id, $id]);
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
