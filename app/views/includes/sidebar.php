<div class="sidebar w-100">
    <h1 class="text-center">MyD Tareo App</h1>
    <nav class="nav flex-column text-center">
        <a href="/public/?page=dashboard" class="nav-link">
            <span class="icon"><i class="bi bi-grid"></i></span>
            <span class="description">Dashboard</span>
        </a>
        <a href="/public/?page=proyectos" class="nav-link">
            <span class="icon"><i class="bi bi-box-seam"></i></span>
            <span class="description">Proyectos</span>
        </a>
        <a href="/public/?page=tickets" class="nav-link">
            <i class="bi bi-ticket-perforated"></i>
            <span class="description">Tickets</span>
        </a>
        <a href="/public/?page=reportes" class="nav-link">
            <i class="bi bi-reception-4"></i>
            <span class="description">Reporte</span>
        </a>
        <a href="/public/?page=usuarios" class="nav-link">
            <i class="bi bi-people"></i>
            <span class="description">Usuarios</span>
        </a>
    </nav>
</div>
<style>
    .sidebar {
        border: 1px solid lightgray;
        height: 100dvh;
        display: flex;
        flex-direction: column;

        .nav {
            height: 100%;
            display: flex;

            a {
                font-size: 22px;
            }

        }

    }
</style>