<?php
include_once __DIR__ . "/../core/DBConnection.php";

class TicketController
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    // Obtener todos los tickets
    public function obtenerTodos()
    {
        $stmt = $this->connection->query("
            SELECT
                t.id AS ticket_id,
                t.nombre AS ticket_nombre,
                t.descripcion,
                t.fecha_creacion,
                et.nombre AS estado_ticket,
                p.id AS proyecto_id,
                p.nombre AS proyecto_nombre,
                u.id AS usuario_id,
                u.nombre AS usuario_nombre
            FROM proyecto_usuario pu
            INNER JOIN proyecto p ON pu.proyecto_id = p.id
            INNER JOIN ticket t ON t.proyecto_id = p.id
            INNER JOIN estado_ticket et ON t.estado_id = et.id
            INNER JOIN usuario u ON pu.usuario_id = u.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorProyecto(int $proyectoId)
    {
        $stmt = $this->connection->prepare("
        SELECT
            t.id AS ticket_id,
            t.nombre AS ticket_nombre,
            t.descripcion,
            t.fecha_creacion,
            et.nombre AS estado_ticket,
            p.id AS proyecto_id,
            p.nombre AS proyecto_nombre
        FROM ticket t
        INNER JOIN estado_ticket et ON t.estado_id = et.id
        INNER JOIN proyecto p ON t.proyecto_id = p.id
        WHERE t.proyecto_id = ?
    ");
        $stmt->execute([$proyectoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Obtener tickets de proyectos asignados a un usuario
    public function obtenerPorUsuario(int $usuarioId)
    {
        $sql = "
SELECT
                t.id AS ticket_id,
                t.nombre AS ticket_nombre,
                t.descripcion,
                t.fecha_creacion,
                et.nombre AS estado_ticket,
                p.id AS proyecto_id,
                p.nombre AS proyecto_nombre,
                u.id AS usuario_id,
                u.nombre AS usuario_nombre
            FROM proyecto_usuario pu
            INNER JOIN proyecto p ON pu.proyecto_id = p.id
            INNER JOIN ticket t ON t.proyecto_id = p.id
            INNER JOIN estado_ticket et ON t.estado_id = et.id
            INNER JOIN usuario u ON pu.usuario_id = u.id
            WHERE pu.usuario_id = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un ticket por su ID
    public function obtenerPorId(int $ticketId)
    {
        $sql = "
            SELECT t.*, et.nombre AS estado, p.nombre AS proyecto
            FROM ticket t
            JOIN estado_ticket et ON t.estado_id = et.id
            JOIN proyecto p ON t.proyecto_id = p.id
            WHERE t.id = ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$ticketId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo ticket
    public function crear(array $data)
    {
        $sql = "INSERT INTO ticket (nombre, descripcion, proyecto_id) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['descripcion'],
            $data['proyecto_id']
        ]);
    }

    // Actualizar ticket
    public function actualizar(int $id, array $data)
    {
        $sql = "UPDATE ticket SET nombre = ?, descripcion = ?, estado_id = ?, proyecto_id = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['descripcion'],
            $data['estado_id'],
            $data['proyecto_id'],
            $id
        ]);
    }

    // Eliminar ticket
    public function eliminar(int $id)
    {
        $stmt = $this->connection->prepare("DELETE FROM ticket WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function contarTicketsPorEstado(): array
    {
        $stmt = $this->connection->query("
        SELECT et.nombre AS estado, COUNT(t.id) AS cantidad
        FROM estado_ticket et
        LEFT JOIN ticket t ON et.id = t.estado_id
        GROUP BY et.nombre
    ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarTicketsPorEstadoPorUsuario(int $usuarioId): array
    {
        $stmt = $this->connection->prepare("
        SELECT et.nombre AS estado, COUNT(t.id) AS cantidad
        FROM estado_ticket et
        LEFT JOIN ticket t ON et.id = t.estado_id
        LEFT JOIN proyecto p ON t.proyecto_id = p.id
        LEFT JOIN proyecto_usuario pu ON p.id = pu.proyecto_id
        WHERE pu.usuario_id = ?
        GROUP BY et.nombre
    ");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
