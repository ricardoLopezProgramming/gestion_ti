<?php
include_once __DIR__ . '/../services/DBConnection.php';

$connection = DBConnection::getConnection();

$sql = "INSERT INTO ticket(titulo, descripcion, estado, proyecto_id) VALUES(?, ?, ?, ?)";
$stmt = $connection->prepare($sql);

$stmt->execute([
    $_POST['titulo'],
    $_POST['descripcion'],
    $_POST['estado'],
    $_POST['proyecto']
]);

header('Location: ../../public/?page=tickets');
exit;
