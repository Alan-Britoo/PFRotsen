<?php

use Models\First;
use Models\Roles;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class FirstController
{
    public function login()
    {

        $email =  $_POST['email'];

        $password =  $_POST['password'];

        $auth = new First;
        $user = $auth->selectAll($email);

        $asignatura = $auth->bring($email);

        if (password_verify($password, $user['password']) && $user['estado'] === 1) {

            session_start();
            $_SESSION['userData'] =  $user;
            $_SESSION['traerAsignatura'] =  $asignatura;

            header('location: ../index.php');
        } else {
            header('location: ../index.php');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location: ../index.php');
    }


    public function Registrar()
    {
        $nombre =  $_POST['nombre'];
        $apellido =  $_POST['apellido'];
        $email =  $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $direccion =  $_POST['direccion'];
        $nacimiento = $_POST['nacimiento'];
        $rol_id =  $_POST['rol'];
        $asignatura_id = $_POST['asignatura_id'];


        $auth = new First;
        $auth->register($nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id);

        header('location: ../index.php?controller=UserController&action=index');
    }
}
