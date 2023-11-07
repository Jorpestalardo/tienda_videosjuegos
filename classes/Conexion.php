<?php
class Conexion 
{
    public const DB_SERVER = "localhost";
    public const DB_USER = "root";
    public const DB_PASS = "";
    public const DB_NAME = "juegos_retro_rossi_pestalardo";

    public const DB_DSN = "mysql:host=". self::DB_SERVER.";dbname=". self::DB_NAME.";charset=utf8mb4";

    /**
     * Esta propiedad es de tipo PDO
     */
    protected static ?PDO $db = null;

    protected static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die("No se pudo conectar a la base de datos :(");
        }
    }
    

    /**
     * Función que devuelve una conexión PDO lista para usar
     * @return PDO
     */

    public static function getConexion() :PDO{

        if(self::$db === null){
            self::conectar();
        }
        return self::$db;
    }
}