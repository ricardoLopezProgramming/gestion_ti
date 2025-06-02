<?php
include_once "../app/controllers/TicketController.php";
include_once "../app/controllers/LeerEstadoTicketController.php";
$ticketController = new TicketController();
?>

<div class="container-fluid">
    <div class="row p-4">
        <h1>Tickets</h1>
        <p>Esta es la página de gestión de tickets.</p>
        <p>En esta sección podrás gestionar los tickets.</p>
    </div>
    <div class="row px-4" style="margin-top: 55px;">
        <table class="table table-bordered">
            <caption>Listado de tickets</caption>
            <thead class="table-warning">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">
                        Estado
                    </th>
                    <th scope="col">Proyecto</th>
                    <th scope="col">Fecha creacion</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SESSION['rol_id'] == 1) {
                    $tickets = $ticketController->obtenerPorUsuario($_SESSION['id']);
                } else {
                    $tickets = $ticketController->obtenerTodos();
                }
                ?>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= htmlspecialchars($ticket['ticket_id']) ?></td>
                        <td><?= htmlspecialchars($ticket['ticket_nombre']) ?></td>
                        <td><?= htmlspecialchars($ticket['descripcion']) ?></td>
                        <td>
                            <select class="btn border-bottom">
                                <?php foreach ($estados as $estado): ?>
                                    <option value="<?= $estado['id'] ?>"><?= $estado['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><?= htmlspecialchars($ticket['proyecto_nombre']) ?></td>
                        <td><?= htmlspecialchars($ticket['fecha_creacion']) ?></td>
                        <td><?= htmlspecialchars($ticket['usuario_nombre']) ?></td>
                        <td>
                            <select onchange="if(this.value) window.location.href=this.value" class="btn border-bottom">
                                <option selected disabled>Selecciona una acción</option>
                                <option value="/public/?page=ver_detalles&id=<?= $ticket['ticket_id'] ?>">Ver detalles</option>
                                <option value="/public/?page=formulario_actualizar_proyecto&id=<?= $ticket['ticket_id'] ?>">Actualizar</option>
                                <option value="../app/controllers/EliminarProyecto.php?id=<?= $ticket['ticket_id'] ?>">Eliminar</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>