<?php
include_once __DIR__ . "/../core/DBConnection.php";

class UsuarioController
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    // Obtener todos los usuarios con su rol
    public function obtenerTodos()
    {
        $stmt = $this->connection->query("
            SELECT u.id, u.nombre, u.correo, u.contraseña, r.nombre AS rol
            FROM usuario u
            INNER JOIN rol r ON u.rol_id = r.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener usuarios asignados a un proyecto
    public function obtenerPorProyecto(int $proyectoId)
    {
        $stmt = $this->connection->prepare("
            SELECT u.id, u.nombre, u.correo, r.nombre AS rol
            FROM proyecto_usuario pu
            INNER JOIN usuario u ON pu.usuario_id = u.id
            INNER JOIN rol r ON u.rol_id = r.id
            WHERE pu.proyecto_id = ?
        ");
        $stmt->execute([$proyectoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un usuario por su ID
    public function obtenerPorId(int $usuarioId)
    {
        $stmt = $this->connection->prepare("
            SELECT u.id, u.nombre, u.correo, r.nombre AS rol
            FROM usuario u
            INNER JOIN rol r ON u.rol_id = r.id
            WHERE u.id = ?
        ");
        $stmt->execute([$usuarioId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPorRolEmpleado()
    {
        $stmt = $this->connection->prepare("SELECT id, nombre, correo FROM usuario WHERE rol_id = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear(array $data)
    {
        $sql = "INSERT INTO usuario (nombre, correo, contraseña, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['correo'],
            $data['contraseña'],
            $data['rol']
        ]);
    }

    public function actualizarUsuario(int $usuarioId, array $data): bool
    {
        $stmt = $this->connection->prepare("
            UPDATE usuario
            SET nombre = ?, correo = ?, contraseña = ?, rol_id = ?
            WHERE id = ?
        ");
        
        return $stmt->execute([
            $data['nombre'],
            $data['correo'],
            $data['contraseña'],
            $data['rol_id'],
            $usuarioId
        ]);
    }
    
    public function eliminar(int $id)
    {
        $sql = "DELETE FROM usuario WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([$id]);
    }
}
