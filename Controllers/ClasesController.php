<?php

use Models\Clases;


require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class ClasesController
{
    public function index()
    {

        $auth = new Clases;
        $auth->Selectall();
        $clases = new Clases;
        $clases->clases();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaClases.php';
    }


    public function registrar()
    {

        $asignatura = $_POST['asignatura'];
        $profesor = $_POST['nombre'];


        $auth = new Clases;
        $auth->register($asignatura, $profesor);

        header('location: ../index.php?controller=ClasesController&action=index');
    }

    public function update()
    {
        $id = $_GET['id'];
        $asignatura = $_POST['asignatura'];
        $profesor = $_POST['profesor_id'];

        $cliente = new Clases;
        $cliente->find($asignatura, $profesor);
        header('location: ../index.php?controller=ClasesController&action=index');
    }

    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Clases;
            $usuario->delete($id);


            header('location: ../index.php?controller=ClasesController&action=index');
        }
    }
}
