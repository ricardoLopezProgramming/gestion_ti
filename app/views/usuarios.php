<?php 
include_once "../app/controllers/UsuarioController.php";
$controller = new UsuarioController();
$usuarios = $controller->obtenerTodos(); 
?>
<div class="container-fluid">
    <div class="row p-4">
        <h1>Usuarios</h1>
        <p>Esta es la página de gestión de usuarios.</p>
        <p>En esta sección podrás gestionar los usuarios del sistema.</p>
    </div>

    <!-- Contenedor centrado para el botón y la tabla -->

    <!-- Botón con margen inferior -->
    <div class="row">
        <div class="col mb-3 text-end">
            <a href="/public/?page=formulario_usuario" class="btn btn-primary">Registrar usuario</a>
        </div>
    </div>

    <!-- Tabla -->
    <div class="row px-4">
        <table class="table table-bordered">
            <caption>Listado de usuarios</caption>
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                        <td><?= htmlspecialchars($usuario['correo']) ?></td>
                        <td><?= htmlspecialchars($usuario['contraseña']) ?></td>
                        <td><?= htmlspecialchars($usuario['rol']) ?></td>
                        <td>
                            <select onchange="if(this.value) window.location.href=this.value" class="btn border-bottom">
                                <option selected disabled>Selecciona una acción</option>
                                <option value="/public/?page=ver_detalles&id=<?= $ticket['ticket_id'] ?>">Ver detalles</option>
                                <option value="/public/?page=formulario_actualizar_usuario&id=<?= urlencode($usuario['id']) ?>">Actualizar</option>
                                <option value="../app/controllers/EliminarUsuarioController.php?id=<?= urlencode($usuario['id']) ?>">Eliminar</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
</div>