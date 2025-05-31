<?php 
    include_once "../app/services/DBConnection.php";
    $connection = DBConnection::getConnection();
    $sql = "SELECT u.id id, u.nombre nombre, u.correo correo, u.contraseña contraseña, r.nombre rol FROM usuario u INNER JOIN rol r ON u.rol_id = r.id;";
    $stmt = $connection->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
