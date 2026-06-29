<?php

class Database
{
    public static $db;
    public static $con;

    public $user = "";
    public $pass = "";
    public $puerto = "";
    public $host = "";
    public $ddbb = "";

    public function __construct()
    {
        // Configuración oficial para el proyecto Eco Mirador
        $this->host = "localhost";
        $this->ddbb = "ecomirador_db";
        $this->user = "root";
        $this->pass = "";
        $this->puerto = "3306";
    }

    function connect()
    {
        try {
            // Incluimos el puerto y charset de forma explícita en el DSN
            $dsn = "mysql:host=$this->host;port=$this->puerto;dbname=$this->ddbb;charset=utf8mb4";
            
            $con = new PDO($dsn, $this->user, $this->pass);
            
            // Atributos de configuración avanzada y seguridad
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            // Desactivar emulación de preparaciones para prevenir SQL Injection real
            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            // Ajuste de zona horaria oficial (-05:00) para las reservas y registros
            $con->exec("SET time_zone = '-05:00';");
            
            return $con;
        } catch (PDOException $e) {
            die("Error crítico: No se puede conectar a la base de datos de Eco Mirador. " . $e->getMessage());
        }
    }

    public static function getCon()
    {
        if (self::$con == null && self::$db == null) {
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }
}