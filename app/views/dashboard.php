<?php
include_once "../app/controllers/TicketController.php";
$controller = new TicketController();

if ($_SESSION['rol_id'] == 1) {
    $estadisticas = $controller->contarTicketsPorEstadoPorUsuario($_SESSION['id']);
} else {
    $estadisticas = $controller->contarTicketsPorEstado();
}

// Preparar datos para JS
$labels = [];
$valores = [];

foreach ($estadisticas as $fila) {
    $labels[] = $fila['estado'];
    $valores[] = $fila['cantidad'];
}
?>
<div class="container mt-5">
    <h3 class="text-center mb-4">Tickets por Estado</h3>
    <canvas id="graficoTickets" height="100"></canvas>
</div>