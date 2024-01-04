<?php

use Models\Clases;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Clases.php';

$a = new Clases;
$b = $a->clases();
$q = new Clases;
$k = $q->bringTecher();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Bootstrap con Paginación y Búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
</style>

<body>
    <div class="container my-10 ml-10">
    <div class="container">
    <div class="row justify-content-between mb-3 mt-3">
        <div class="col-6">
            <h2 class="titulo">Lista de Clases</h2>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Clase
            </button>
        </div>
    </div>
</div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Clase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../index.php?controller=ClasesController&action=registrar" method="post">
                            <div class="mb-3">
                                <label for="asignatura"><strong>Nombre de la Materia</strong></label>
                                <input type="text" name="asignatura" class="form-control" placeholder="Ingresa Nueva Materia">
                            </div>

                            <div class="mb-3">
                                <label for="asignatura_id"><strong>Maestros disponible para las clases</strong></label>
                                <select class="form-select" name="nombre" id="selectProfesores">

                                    <option value="" selected><strong>Seleccionar Profesor</strong></option>
                                    <?php foreach ($k as $maestros) : ?>

                                        <option value="<?= $maestros['profesor'] ?>"><?= $maestros['nombre'] ?> <?= $maestros['apellido'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                    </div>

                    <div class="text-center pb-4">
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <table id="datatable_users" class="table table-striped ">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Clase</th>
                        <th>Maestro</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($b as $asignaturas) : ?>
                        <tr>
                            <td><?= $asignaturas['id'] ?></td>
                            <td><?= $asignaturas['asignatura']  ?></td>
                            <td><?= $asignaturas['nombre']  ?><?= $asignaturas['profesor_id'] ?> <?= $asignaturas['apellido']  ?></td>

                            <td>

                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                                <a href="../index.php?controller=ClasesController&action=update&id=<?= $asignaturas['id'] ?>" class="fa-regular fa-pen-to-square" data-toggle="modal" data-target="#actualizarMateriaModal_<?= $asignaturas['id'] ?>" style="color: green;"></a>


                                <div class="modal fade" id="actualizarMateriaModal_<?= $asignaturas['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="actualizarMateriaModalLabel_<?= $asignaturas['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="actualizarMateriaModalLabel">Actualizar Materia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../index.php?controller=ClasesController&action=update&id=<?= $asignaturas['id'] ?> " method="POST">
                                                    <div class="mb-3">
                                                        <label for="name">Nombre de la Materia</label>

                                                        <input type="text" name="asignatura" class="form-control" placeholder="Ingresa Materia" value="<?= $asignaturas['asignatura'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selectProfesores">Maestro Asignado</label>


                                                        <select class="form-select" name="profesor_id" id="selectProfesores">

                                                            <option value="" selected>Seleccione una opcion</option>
                                                            <?php foreach ($k as $maestros) : ?>

                                                                <option value="<?= $maestros['profesor'] ?>"> <?= $maestros['nombre'] ?> <?= $maestros['apellido'] ?></option>
                                                            <?php endforeach; ?>

                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../index.php?controller=ClasesController&action=destroy&id=<?= $asignaturas['id'] ?>" class="fa-solid fa-trash-can " style="color: rgb(170, 11, 11);;"></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable_users').DataTable({
                lengthMenu: [5, 10, 15, 20],
                searching: true,
                pageLength: 5
            });
        });
    </script>
</body>

</html>