<?php

if (isset($_SESSION['traerAsignatura']) && !empty($_SESSION['traerAsignatura'])) {
    $asignatura = $_SESSION['traerAsignatura'];;
}

$info = $_SESSION['userData'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Bootstrap con Paginación y Búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<style>
    .table {
        width: 95%;
        margin: 20px auto;
        padding: 0;
    }

    .nav {
        background-color: #007bff;
        border: 1px solid gray;
        height: 40px;
        text-align: left;
    }

    .rol {
        padding: 5px;
        border-radius: 10px;

    }
</style>

<body>

    <div class="container my-10 ml-10">
        <div class="row">
            <div class="col-14">
                <h2 class="titulo">Maestro: <?= $info['nombre'] ?> <?= $info['apellido'] ?> Clase: <?= $asignatura['asignatura'] ?></h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">


            </div>
        </div>

    </div>
    </div>


    <div class="row ">
        <div class="col-12">
            <div class="table-responsive">
                <table id="datatable_users" class="table table-striped ">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Email / Usuario</th>
                            <th>Direccion</th>
                            <th>Fecha Nacimiento</th>

                            <th>Asignatura</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?= $info['id'] ?></td>
                            <td><?= $info['nombre'] ?> <?= $info['apellido'] ?></td>
                            <td><?= $info['email'] ?></td>
                            <td><?= $info['direccion'] ?></td>
                            <td><?= $info['nacimiento'] ?> </td>
                            <td><?php
                                if (empty($asignatura['asignatura'])) {
                                    echo '<div style="display: inline-block; background-color: gold; padding: 5px;  border-radius: 7px">Asignatura no registrada</div>';
                                } else {
                                    echo $asignatura['asignatura'];
                                }
                                ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>