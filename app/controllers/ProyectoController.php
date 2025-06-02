<?php
include_once __DIR__ . "/../core/DBConnection.php";

class ProyectoController
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    public function obtenerTodos()
    {
        $stmt = $this->connection->query("
            SELECT 
                p.id, 
                p.nombre, 
                p.descripcion, 
                p.fecha_inicio, 
                p.fecha_fin, 
                e.nombre AS estado
            FROM proyecto p 
            INNER JOIN estado_proyecto e ON p.estado_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorUsuario(int $usuarioId)
    {
        $sql = "
            SELECT 
                p.id, 
                p.nombre, 
                p.descripcion, 
                p.fecha_inicio, 
                p.fecha_fin, 
                e.nombre AS estado
            FROM proyecto_usuario pu
            INNER JOIN proyecto p ON pu.proyecto_id = p.id
            INNER JOIN estado_proyecto e ON p.estado_id = e.id
            WHERE pu.usuario_id = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId(int $proyectoId)
    {
        $sql = "
            SELECT 
                p.id, 
                p.nombre, 
                p.descripcion, 
                p.fecha_inicio, 
                p.fecha_fin, 
                e.nombre AS estado
            FROM proyecto p
            JOIN estado_proyecto e ON p.estado_id = e.id
            WHERE p.id = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$proyectoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(array $data): bool
    {
        try {
            $this->connection->beginTransaction();

            // Insertar el proyecto
            $stmt = $this->connection->prepare("
                INSERT INTO proyecto (nombre, descripcion, fecha_inicio, fecha_fin, estado_id) 
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $data['nombre'],
                $data['descripcion'],
                $data['fecha_inicio'],
                $data['fecha_fin'],
                $data['estado_id'] ?? 1 // por defecto: abierto
            ]);

            $proyectoId = $this->connection->lastInsertId();

            // Insertar usuarios al proyecto
            if (!empty($data['usuarios'])) {
                $stmt2 = $this->connection->prepare("
                    INSERT INTO proyecto_usuario (proyecto_id, usuario_id) VALUES (?, ?)
                ");
                foreach ($data['usuarios'] as $usuarioId) {
                    $stmt2->execute([$proyectoId, $usuarioId]);
                }
            }

            $this->connection->commit();
            return true;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            error_log("Error al crear proyecto: " . $e->getMessage());
            return false;
        }
    }


    public function actualizar(int $id, array $data)
    {
        $sql = "UPDATE proyecto SET nombre = ?, descripcion = ?, fecha_inicio = ?, fecha_fin = ?, estado_id = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['descripcion'],
            $data['fecha_inicio'],
            $data['fecha_fin'],
            $data['estado_id'],
            $id
        ]);
    }

    // ✅ Eliminar proyecto
    public function eliminar(int $id)
    {
        $stmt = $this->connection->prepare("DELETE FROM proyecto WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
