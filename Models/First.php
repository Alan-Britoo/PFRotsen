<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class First
{
    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function selectAll($email)
    {
        $query = "SELECT * FROM usuarios WHERE email = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);

            $rs = $stm->fetch(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function register($nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id)
    {
        $query = "INSERT INTO usuarios(`nombre`,`apellido`, `email`, `password`,`direccion`, `nacimiento`, `rol_id`,`asignatura_id`) VALUES (?,?,?,?,?,?,?,?)";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function bring($email)
    {
        $query = "SELECT asignaturas.asignatura FROM asignaturas INNER JOIN usuarios on usuarios.asignatura_id = asignaturas.id WHERE email = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);

            $rs = $stm->fetch(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
