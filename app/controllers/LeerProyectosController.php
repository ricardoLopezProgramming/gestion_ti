<?php 
    include_once "../app/core/DBConnection.php";
    $connection = DBConnection::getInstance()->getConnection();
    $sql = "SELECT p.id id, p.nombre nombre, p.descripcion descripcion, p.fecha_inicio fecha_inicio, p.fecha_fin fecha_fin, e.nombre estado FROM proyecto p INNER JOIN estado_proyecto e ON p.estado_id = e.id";
    $stmt = $connection->query($sql);
    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
