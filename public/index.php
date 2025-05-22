<!-- index.php -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2 d-flex flex-column align-items-start p-0">
            <?php include "../app/views/includes/sidebar.php"; ?>
        </div>

        <!-- Contenido -->
        <div class="col-10 p-0">
            <?php
            include "../app/views/includes/header.php";
            $page = $_GET['page'] ?? 'dashboard';
            switch ($page) {
                case 'dashboard':
                    $title = "Dashboard";
                    include "../app/views/pages/dashboard.php";
                    break;
                case 'proyectos':
                    $title = "Proyectos";
                    include "../app/views/pages/proyectos.php";
                    break;
                case 'usuarios':
                    $title = "Usuarios";
                    include '../app/views/pages/usuarios.php';
                    break;
                case 'info':
                    $title = "Info";
                    include '../app/views/pages/info.php';
                    break;
                default:
                    include '../app/views/pages/404.php';
                    break;
            }
            include "../app/views/includes/footer.php";
            ?>
        </div>
    </div>
</div>
