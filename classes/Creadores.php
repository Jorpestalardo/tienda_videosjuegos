<?php

class Creadores
{
    

    protected $creadores_id;
    protected $nombre;
    protected $biografia;
    protected $company;
    protected $alt;
    protected $imagen;

    /**
 * Devuelve el cátalogo completo de Creadores:
 */
    public function catalogo_completo(): array{
    
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM creadores";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $catalogo = $PDOStatement->fetchAll();

    /*
    echo "<pre>";
    print_r($catalogo);
    echo "</pre>";
*/
    return $catalogo;
}




    /**
     * Devuelve los datos de los creadores en particular
     * @param int $idCreadores El ID único de los creadores 
     */
    public function get_x_id(int $idCreadores): ?Creadores
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM creadores WHERE creadores_id = :idCreadores";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'idCreadores' => $idCreadores
            ]
        );

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }


    /**
     * Get the value of creadores
     */ 
    public function getNombre_completo()
    {
        return $this->nombre;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->imagen;
    }

    /**
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }

        /**
     * Get the value of creadores_id
     */ 
    public function getCreadores_id()
    {
        return $this->creadores_id;
    }



    public function insert($nombre, $biografia, $company, $alt, $imagen){

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO creadores(`creadores_id`,`nombre`,`biografia`,`company`,`alt`,`imagen`) VALUES (NULL, :nombre, :biografia, :company, :alt, :imagen)";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'biografia' => $biografia,
                'company' => $company,
                'alt' => $alt,
                'imagen' => $imagen
            ]   
        );
    
        }   
    
        public function edit($nombre, $biografia, $company, $alt, $creadores_id){
    
        $conexion = Conexion::getConexion();
        $query = "UPDATE creadores SET nombre = :nombre, biografia = :biografia, company = :company, alt = :alt WHERE creadores_id = :creadores_id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'creadores_id' => $creadores_id,
                'nombre' => $nombre,
                'biografia' => $biografia,
                'company' => $company,
                'alt' => $alt
            ]   
        );
    }
    
        /**
     * Reemplaza la imagen de el o los creadores
     * @param string $imagen 
     * @param int $creadores_id
     */
        public function reemplazar_imagen($imagen, $creadores_id)
        {
        $conexion = Conexion::getConexion();
        $query = "UPDATE creadores SET imagen = :imagen WHERE creadores_id = :creadores_id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'creadores_id' => $creadores_id,
                'imagen' => $imagen
            ]
        );
        }
    
    /**
     * Elimina esta instancia de la base de datos
     */
        public function delete()
        {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM creadores WHERE creadores_id = ?;";
    
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->creadores_id]);
        }
    

}
