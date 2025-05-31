<?php include_once '../app/controllers/LeerRolController.php' ?>
<div class="col-4 mx-auto mt-5">
    <section class="container p-4">
        <h2 class="text-center mb-3"><?= strtoupper($title) ?></h2>
        <form action="../app/controllers/RegistrarUsuarioController.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" id="rol" class="form-select" required>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= $rol['id'] ?>"><?= $rol['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="/public/?page=usuarios" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </section>
</div>