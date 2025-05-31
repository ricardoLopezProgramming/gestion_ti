<?php
session_start();
require_once '../app/services/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = DBConnection::getConnection();
    $sql = "SELECT u.*, r.nombre AS rol_nombre FROM usuario u 
            JOIN rol r ON u.rol_id = r.id 
            WHERE u.correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['correo']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $_POST['contraseña'] === $usuario['contraseña']) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = strtolower($usuario['rol_nombre']);
        header("Location: ../public/?page=dashboard.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!-- FORMULARIO DE LOGIN -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <form method="POST" class="bg-white p-5 rounded shadow" style="width: 400px;">
        <h2 class="text-center text-primary mb-4">Iniciar sesión</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</body>
</html>
