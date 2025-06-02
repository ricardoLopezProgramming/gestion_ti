<?php
include_once "../app/core/DBConnection.php";
$connection = DBConnection::getInstance()->getConnection();
$sql = "SELECT t.id, t.nombre, t.descripcion, e.nombre estado, t.fecha_creacion, p.nombre proyecto FROM ticket t INNER JOIN estado_ticket e ON t.estado_id = e.id INNER JOIN proyecto p ON t.proyecto_id = p.id";
$stmt = $connection->query($sql);
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
