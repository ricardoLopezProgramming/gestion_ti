<?php
include_once __DIR__ . '/../services/DBConnection.php';
$connection = DBConnection::getConnection();
$stmt = $connection->prepare("UPDATE usuarios SET nombre = ?, correo = ?, contraseña = ?, rol_id = ? WHERE id = ?");
$stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['contraseña'], $_POST['rol'], $_GET['id']]);
header('Location: ../../public/?page=usuarios');
exit;
