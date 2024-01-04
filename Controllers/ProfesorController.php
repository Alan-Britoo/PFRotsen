<?php

use Models\Maestro;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class ProfesorController
{
    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaProfesor.php';
    }
}
