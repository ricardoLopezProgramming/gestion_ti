<?php
class DBConnection
{
    private const HOST = '127.0.0.1';
    private const USER = 'root';
    private const PASSWORD = '';
    private const DB_NAME = 'gestion_ti';
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME . ';charset=utf8',
                    self::USER,
                    self::PASSWORD
                );
                date_default_timezone_set('America/Lima');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
        }
        return self::$connection;
    }
}
