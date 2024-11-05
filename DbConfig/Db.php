<?php
class DB
{
    private static $conn = null;

    public static function getConnection()
    {
        try {
            if (self::$conn == null) {
                $config = include 'config.php';
                self::$conn = new PDO(
                    "mysql:host=" . $config['ServerName'] . ";dbname=" . $config['dbName'],
                    $config['username'],
                    $config['password']
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            throw $e;
        }
    }
}