<div class="sidebar w-100 vh-100 border-end border-secondary">
    <!-- <img src="../public/assets/images/web/icon-192.png" class="img-fluid" alt="Logo" loading="lazy" decoding="async" style="max-width: 60px;"> -->
    <h1 class="text-center py-3">MyD Tareo App</h1>
    <nav class="nav flex-column fs-5">
        <a href="/public/?page=dashboard" class="nav-link d-flex align-items-center justify-content-center">
            <i class="bi bi-grid me-2" style="width: 24px; text-align: center;"></i>
            <span>Dashboard</span>
        </a>
        <a href="/public/?page=404" class="nav-link d-flex align-items-center justify-content-center">
        <i class="bi bi-clock me-2"></i>
            <span>Horas</span>
        </a>
        <a href="/public/?page=proyectos" class="nav-link d-flex align-items-center justify-content-center">
            <i class="bi bi-box-seam me-2" style="width: 24px; text-align: center;"></i>
            <span>Proyectos</span>
        </a>
        <a href="/public/?page=tickets" class="nav-link d-flex align-items-center justify-content-center">
            <i class="bi bi-ticket-perforated me-2" style="width: 24px; text-align: center;"></i>
            <span>Tickets</span>
        </a>
        <?php if ($_SESSION['rol_id'] == 2 or $_SESSION['rol_id'] == 3): ?>
            <a href="/public/?page=404" class="nav-link d-flex align-items-center justify-content-center">
                <i class="bi bi-reception-4 me-2" style="width: 24px; text-align: center;"></i>
                <span>Reporte</span>
            </a>
        <?php endif; ?>
        <?php if ($_SESSION['rol_id'] == 3): ?>
            <a href="/public/?page=usuarios" class="nav-link d-flex align-items-center justify-content-center">
                <i class="bi bi-people me-2" style="width: 24px; text-align: center;"></i>
                <span>Usuarios</span>
            </a>
        <?php endif; ?>
        <a href="/app/controllers/SignOutController.php" class="nav-link d-flex align-items-center text-danger justify-content-center">
            <i class="bi bi-box-arrow-left me-2" style="width: 24px; text-align: center;"></i>
            <span>Cerrar sesión</span>
        </a>
    </nav>
</div>