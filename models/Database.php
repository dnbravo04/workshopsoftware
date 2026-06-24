<?php

class Database
{
    private static $server = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $database = 'workshopsoftware_db';
    private static $connection = null;

    public static function connect()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$server . ";dbname=" . self::$database . ";charset=utf8",
                    self::$user,
                    self::$password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                error_log("DB connection failed: " . $e->getMessage());
                die("Error de conexión. Por favor contacte al administrador.");
            }
        }

        return self::$connection;
    }
}
