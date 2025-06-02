<?php
include_once '../app/controllers/ProyectoController.php';
$controller = new ProyectoController();
$proyecto = $controller->obtenerPorId($_GET['proyecto_id']);
?>
<div class="col-4 mx-auto mt-5">
    <section class="container p-4">
        <h2 class="text-center mb-3"><?= strtoupper($title) ?></h2>
        <form action="../app/controllers/RegistrarTicketController.php" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" name="nombre" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="proyecto" class="form-label">Proyecto</label>
                <select name="proyecto_id" id="proyecto" class="form-select" required>
                    <option value="<?= $proyecto['id'] ?>"><?= $proyecto['nombre'] ?></option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Registrar</button>
            <a href="/public/?page=detalles_proyecto&id=<?= $_GET['proyecto_id'] ?>" class="btn btn-danger ms-2">Cancelar</a>
        </form>
    </section>
</div>