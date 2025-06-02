<?php
require_once '../../app/core/DBConnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña']; // Solo recibimos la contraseña plana

    try {
        $connection = DBConnection::getInstance()->getConnection();
        $sql = "SELECT * FROM usuario WHERE correo = ? ";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // if ($usuario && contraseña_verify($contraseña, $usuario['contraseña'])) {
        if ($usuario && $contraseña === $usuario['contraseña']) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['rol_id'] = $usuario['rol_id'];

           // if ($usuario['rol_id'] == 1) {
                header('Location: ../../public/?page=dashboard');
                exit;
            // } elseif ($usuario['rol_id'] == 2) {
            //     header('Location: ../../public/?page=dashboard_jefe_proyectos');
            //     exit;
            // } elseif ($usuario['rol_id'] == 3) {
            //     header('Location: ../../public/?page=dashboard_administrativo');
            //     exit;
           // } else {
            //    echo "Degenerated accesst";
           // }
        } else {
            echo "❌ Invalid email or password.";
        }
    } catch (PDOException $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
