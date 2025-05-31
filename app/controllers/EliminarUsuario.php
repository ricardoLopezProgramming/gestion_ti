<?php
include_once __DIR__ . '/../services/DBConnection.php';
$connection = DBConnection::getConnection();
$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id = $id";
$result = $connection->query($sql);
if ($connection->affected_rows > 0) {
    echo "<script>
        alert('Usuario eliminado correctamente');
        window.location.href = '/public/?page=usuarios';
    </script>";
} else {
    echo "<script>
        alert('Error al eliminar el usuario');
        window.location.href = '/public/?page=usuarios';
    </script>";
}
