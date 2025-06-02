<?php
include_once '../app/controllers/LeerRolController.php';
include_once '../app/core/DBConnection.php';

$connection = DBConnection::getInstance()->getConnection();

$stmt = $connection->prepare("SELECT u.id, u.nombre, u.correo, u.contraseña, u.rol_id, r.nombre AS rol FROM usuario u INNER JOIN rol r ON u.rol_id = r.id WHERE u.id = ?");

$stmt->execute([$_GET['id']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="col-4 mx-auto mt-5">
    <section class="container p-4">
        <h2 class="text-center mb-3" style="background-color: royalblue;"><?= strtoupper($title) ?></h2>
        <form action="../app/controllers/ActualizarUsuarioController.php?id=<?= $usuario['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $usuario['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" value="<?= $usuario['correo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" class="form-control" value="<?= $usuario['contraseña']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" id="rol" class="form-select" required>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= $rol['id'] ?>" <?= $rol['id'] == $usuario['rol_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($rol['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="/public/?page=usuarios" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </section>
</div>