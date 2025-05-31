<?php 
    include_once "../app/services/DBConnection.php";
    $connection = DBConnection::getConnection();
    $sql = "SELECT * FROM rol";
    $stmt = $connection->query($sql);
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
