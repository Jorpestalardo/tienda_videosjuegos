<?php
class Alumna
{

    protected $nombre;
    protected $apellido;
    protected $edad;
    protected $email;
    protected $img;
    protected $instagram;



/**
 * Devuelve el cátalogo completo de alumnas:
 */
public function alumnas_informacion(): array{
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM alumna";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $catalogo = $PDOStatement->fetchAll();

    return $catalogo;
    }


    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }
    /**
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }
    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->email;
    }
    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }
    /**
     * Get the value of instagram
     */ 
    public function getInstagram()
    {
        return $this->instagram;
    }

}