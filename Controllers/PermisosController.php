<?php

use Models\Permisos;
use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class PermisosController
{

    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }
    public function index()
    {
        $permisos = new Permisos;
        $perm = $permisos->select();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaPermisos.php';
    }


    public function update()
    {
        $id = $_GET['id'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $rol_id = $_POST['rol_id'];


        $cliente = new Permisos;
        $cliente->updates($email, $estado, $rol_id, $id);

        header('location: ../index.php?controller=PermisosController&action=index');
    }


    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Permisos;
            $usuario->delete($id);


            header('location: ../index.php?controller=PermisosController&action=index');
        }
    }
}
