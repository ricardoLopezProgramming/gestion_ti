<?php
include_once __DIR__ . '/../services/DBConnection.php';

$connection = DBConnection::getConnection();

$sql = "INSERT INTO proyectos(nombre, descripcion, fecha_inicio, fecha_fin) VALUES(?, ?, ?, ?)";
$stmt = $connection->prepare($sql);

$stmt->execute([
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['fecha_inicio'],
    $_POST['fecha_fin']
]);

header('Location: ../../public/?page=proyectos');
exit;
