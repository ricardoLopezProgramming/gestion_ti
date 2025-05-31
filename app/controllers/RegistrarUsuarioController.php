<?php
include_once __DIR__ . '/../services/DBConnection.php';
$connection = DBConnection::getConnection();
$sql = "INSERT INTO usuario(nombre, correo, contraseña, rol_id) VALUES(?, ?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['contraseña'], $_POST['rol']]);
header('Location: ../../public/?page=usuarios');
exit;
