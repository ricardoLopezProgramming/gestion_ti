<?php
include_once "TicketController.php";

$controller = new TicketController();

$data = [
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'proyecto_id' => $_POST['proyecto_id']
];

if ($controller->crear($data)) {
    header("Location: /public/?page=tickets");
    exit;
} else {
    echo "Error al crear el ticket.";
}
