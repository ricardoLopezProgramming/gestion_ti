<?php 
    include_once "../app/core/DBConnection.php";
    $connection = DBConnection::getInstance()->getConnection();
    $sql = "SELECT * FROM estado_ticket";
    $stmt = $connection->query($sql);
    $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);