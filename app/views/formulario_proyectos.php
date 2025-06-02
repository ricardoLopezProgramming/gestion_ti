<div class="col-4 mx-auto mt-5">
    <section class="container p-4">
        <h2 class="text-center mb-3"><?= strtoupper($title) ?></h2>
        <form action="../app/controllers/RegistrarProyectoController.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="usuarios" class="form-label">Asignar empleados</label>
                <select name="usuarios[]" id="usuarios" class="form-select" multiple required>
                    <?php
                    include_once "../app/controllers/UsuarioController.php";
                    $usuarios = (new UsuarioController())->obtenerPorRolEmpleado(); // método que filtra solo empleados
                    foreach ($usuarios as $usuario):
                    ?>
                        <option value="<?= $usuario['id'] ?>"><?= $usuario['nombre'] ?> (<?= $usuario['correo'] ?>)</option>
                    <?php endforeach; ?>
                </select>
                <small class="text-muted">Mantén Ctrl o Cmd presionado para seleccionar varios</small>
            </div>

            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="/public/?page=proyectos" class="btn btn-danger ms-2">Cancelar</a>
        </form>
    </section>
</div>