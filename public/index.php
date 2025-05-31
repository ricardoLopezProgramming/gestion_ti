<?php

// session_start();

// // Redirigir al login si no hay sesión activa
// if (!isset($_SESSION['usuario_id'])) {
//     header("Location: ../public/login.php");
//     exit;
// }

$page = isset($_GET['page']) && file_exists("../app/views/pages/{$_GET['page']}.php") ? $_GET['page'] : 'dashboard';
$title = ucfirst($page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'pagina' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 d-flex flex-column align-items-start p-0">
                <?php include "../app/views/includes/sidebar.php"; ?>
            </div>
            <!-- Contenido -->
            <div class="col-10 mx-auto mt-5">
                <?php
                include_once "../app/views/pages/$page.php";
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>