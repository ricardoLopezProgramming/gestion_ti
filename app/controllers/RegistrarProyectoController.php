<?php
include_once "ProyectoController.php";

$controller = new ProyectoController();

$data = [
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'fecha_inicio' => $_POST['fecha_inicio'],
    'fecha_fin' => $_POST['fecha_fin'],
    'estado_id' => 1,
    'usuarios' => $_POST['usuarios'] ?? [] // múltiple select
];

if ($controller->crear($data)) {
    header("Location: /public/?page=proyectos");
    exit;
} else {
    echo "Error al crear el proyecto.";
}
