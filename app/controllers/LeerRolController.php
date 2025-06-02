<?php 
    include_once "../app/core/DBConnection.php";
    $connection = DBConnection::getInstance()->getConnection();
    $sql = "SELECT * FROM rol";
    $stmt = $connection->query($sql);
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
