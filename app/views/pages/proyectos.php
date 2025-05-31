<?php
include_once "../app/controllers/LeerProyectosController.php";
?>

<div class="container-fluid">
    <div class="row p-4">
        <h1>Proyectos</h1>
        <p>Esta es la página de gestión de proyectos.</p>
        <p>En esta sección podrás gestionar los proyectos.</p>
    </div>

    <div class="row">
        <div class="col mb-3 text-end">
            <a href="/public/?page=formulario_proyectos" class="btn btn-success">Registrar proyecto</a>
        </div>
    </div>

    <!-- Tabla -->
    <div class="row px-4">
        <table class="table table-bordered">
            <caption>Listado de proyectos</caption>
            <thead class="table-success">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $proyecto): ?>
                    <tr>
                        <td><?= htmlspecialchars($proyecto['id']) ?></td>
                        <td><?= htmlspecialchars($proyecto['nombre']) ?></td>
                        <td><?= htmlspecialchars($proyecto['descripcion']) ?></td>
                        <td><?= htmlspecialchars($proyecto['fecha_inicio']) ?></td>
                        <td><?= htmlspecialchars($proyecto['fecha_fin']) ?></td>
                        <td><?= htmlspecialchars($proyecto['estado']) ?></td>
                        <td>
                            <a href="/public/?page=formulario_actualizar_proyecto&id=<?= $proyecto['id'] ?>" class="btn btn-warning">Actualizar</a>
                            <a href="../app/controllers/EliminarProyecto.php?id=<?= $proyecto['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>