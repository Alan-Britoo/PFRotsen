<?php

session_start();
if (isset($_SESSION['userData'])) {
    $userData = $_SESSION['userData'];

    $cliente  = ['Clases' =>
    [ 'url' => 'index.php?controller=ProfesorController&action=index',
    'icon'=>  ' ../assets/tercero.png']];
    $admin = [
        'Permisos' => [
            'url' => 'index.php?controller=PermisosController&action=index',
            'icon' => ' ../assets/primero.png'
        ],
        'Maestros' => [
            'url' => 'index.php?controller=UserController&action=index',
            'icon' => ' ../assets/segundo.png'
        ],
        'Clases' => ['url' => 'index.php?controller=ClasesController&action=index',
        'icon' => ' ../assets/tercero.png'
        ]
    ];


    if ($userData['rol_id'] === 1) {
        $menu = $admin;
    } else if ($userData['rol_id'] === 2) {
        $menu = $cliente;
    }
} else {
    header('location: ./Views/login.php');
}
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';

if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
}

