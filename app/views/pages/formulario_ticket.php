<?php include_once '../app/controllers/LeerProyectosController.php' ?>
<div class="col-4 mx-auto mt-5">
    <section class="container p-4">
        <h2 class="text-center mb-3"><?= strtoupper($title) ?></h2>
        <form action="../app/controllers/RegistrarTicketController.php" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="proyecto" class="form-label">Proyecto</label>
                <select name="proyecto" id="proyecto" class="form-select" required>
                    <?php foreach ($proyectos as $proyecto): ?>
                        <option value="<?= $proyecto['id'] ?>"><?= $proyecto['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Registrar</button>
            <a href="/public/?page=tickets" class="btn btn-danger ms-2">Cancelar</a>
        </form>
    </section>
</div>