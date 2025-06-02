<?php
include_once 'ProyectoController.php';

$controller = new ProyectoController();

$id = $_GET['id'] ?? null;

if ($id && $controller->eliminar((int) $id)) {
    header("Location: /public/?page=proyectos");
    exit;
} else {
    echo "Error al eliminar el proyecto.";
}
