<?php
include_once "UsuarioController.php";

$controller = new UsuarioController();

$data = [
    'nombre' => $_POST['nombre'],
    'correo' => $_POST['correo'],
    'contraseña' => $_POST['contraseña'],
    'rol' => $_POST['rol']
];

if ($controller->crear($data)) {
    header("Location: /public/?page=usuarios");
    exit;
} else {
    echo "Error al crear el usuario.";
}