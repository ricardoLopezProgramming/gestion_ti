<?php
include_once "UsuarioController.php";

$controller = new UsuarioController();

$id = $_GET['id'];

if ($controller->eliminar($id)) {
    header("Location: /public/?page=usuarios");
    exit;
} else {
    echo "Error al crear el usuario.";
}