<?php

use Models\Roles;
use Models\Usuario;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class UserController
{

    public function index()
    {
        $clientes = new Usuario;

        $data = $clientes->SelectAll();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/table.php';
    }
    public function index2()
    {
        $clientes = new Usuario;

        $da = $clientes->SelectAll();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaPermisos.php';
    }


    public function updateView()
    {
        $roles = new Roles;
        $data = $roles->all();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/update.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $direccion = $_POST['direccion'];
        $nacimiento = $_POST['nacimiento'];
        $rol_id = $_POST['rol'];
        $asignatura_id = $_POST['asignatura_id'];


        $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

        $cliente = new Usuario;

        $cliente->update($nombre, $apellido, $email, $password, $estado, $direccion, $nacimiento, $rol_id, $asignatura_id, $id);

        header('location: ../index.php?controller=UserController&action=index');
    }


    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuario;
            $usuario->delete($id);


            header('location: ../index.php?controller=UserController&action=index');
        }
    }
}
