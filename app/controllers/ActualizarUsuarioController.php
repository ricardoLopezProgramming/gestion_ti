<?php
include_once 'UsuarioController.php';

$controller = new UsuarioController();

$id = $_GET['id'];

$data = [
    'nombre' => $_POST['nombre'],
    'correo' => $_POST['correo'],
    'contraseña' => $_POST['contraseña'],
    'rol_id' => $_POST['rol']
];

if ($controller->actualizarUsuario($id, $data)) {
    header("Location: /public/?page=usuarios");
    exit;
} else {
    echo "Error al actualizar el usuario.";
}
