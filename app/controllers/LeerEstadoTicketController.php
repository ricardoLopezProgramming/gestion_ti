<?php 
    include_once "../app/services/DBConnection.php";
    $connection = DBConnection::getConnection();
    $sql = "SELECT * FROM estado_ticket";
    $stmt = $connection->query($sql);
    $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);