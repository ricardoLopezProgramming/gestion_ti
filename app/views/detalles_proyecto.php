<?php
include_once "../app/controllers/ProyectoController.php";
include_once "../app/controllers/UsuarioController.php";
include_once "../app/controllers/TicketController.php";

$proyectoId = $_GET['id'];
$proyectoController = new ProyectoController();
$ticketController = new TicketController();
$usuarioController = new UsuarioController();

$proyecto = $proyectoController->obtenerPorId($proyectoId);
$empleados = $usuarioController->obtenerPorProyecto($proyectoId);
$tickets = $ticketController->obtenerPorProyecto($proyectoId);
?>

<div class="container-fluid p-4">
    <!-- Proyecto -->
    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm border-success">
                <div class="card-body">
                    <h3 class="card-title text-success"><?= htmlspecialchars($proyecto['nombre']) ?></h3>
                    <h6 class="card-subtitle mb-2 text-muted">Estado: <?= htmlspecialchars($proyecto['estado']) ?></h6>
                    <p class="card-text"><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                    <p class="card-text">
                        <strong>Fecha Inicio:</strong> <?= htmlspecialchars($proyecto['fecha_inicio']) ?> |
                        <strong>Fecha Fin:</strong> <?= htmlspecialchars($proyecto['fecha_fin']) ?>
                    </p>
                    <div class="text-end mt-3">
                        <a href="/public/?page=formulario_actualizar_proyecto&id=<?= $proyecto['id'] ?>" class="btn btn-warning <?= ($_SESSION['rol_id'] == 2 or $_SESSION['rol_id'] == 3) ? '' : 'disabled' ?>">Actualizar proyecto</a>
                        <a href="../app/controllers/EliminarProyectoController.php?id=<?= $proyecto['id'] ?>" class="btn btn-danger <?= ($_SESSION['rol_id'] == 2 or $_SESSION['rol_id'] == 3) ? '' : 'disabled' ?>">Eliminar proyecto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empleados y Tickets -->
    <div class="row">
        <!-- Empleados -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-info">
                <div class="card-header bg-info text-white">
                    Empleados asignados
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($empleados as $empleado): ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($empleado['nombre']) ?> - <?= htmlspecialchars($empleado['correo']) ?>
                        </li>
                    <?php endforeach; ?>
                    <?php if (empty($empleados)): ?>
                        <li class="list-group-item text-muted">No hay empleados asignados.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Tickets -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                    <span>Tickets del proyecto</span>
                    <a href="/public/?page=formulario_ticket&proyecto_id=<?= $proyecto['id'] ?>" class="btn btn-light btn-sm <?= ($_SESSION['rol_id'] == 2 || $_SESSION['rol_id'] == 3) ? '' : 'disabled' ?>">Registrar ticket</a>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($tickets as $ticket): ?>
                        <li class="list-group-item">
                            <strong><?= htmlspecialchars($ticket['ticket_nombre']) ?>:</strong>
                            <?= htmlspecialchars($ticket['descripcion']) ?>
                            <div class="mt-2">
                                <select onchange="if(this.value) window.location.href=this.value" class="form-select form-select-sm">
                                    <option selected disabled>Selecciona una acción</option>
                                    <option value="/public/?page=ver_detalles&id=<?= $ticket['ticket_id'] ?>">Ver detalles</option>
                                    <option <?= ($_SESSION['rol_id'] == 2 or $_SESSION['rol_id'] == 3) ? '' : 'disabled' ?> value="/public/?page=formulario_actualizar_ticket&id=<?= $ticket['ticket_id'] ?>">Actualizar</option>
                                    <option <?= ($_SESSION['rol_id'] == 2 or $_SESSION['rol_id'] == 3) ? '' : 'disabled' ?> value="../app/controllers/EliminarTicket.php?id=<?= $ticket['ticket_id'] ?>">Eliminar</option>
                                </select>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <?php if (empty($tickets)): ?>
                        <li class="list-group-item text-muted">No hay tickets registrados.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>