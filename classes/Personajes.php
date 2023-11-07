<?PHP

class Personajes
{
    protected $personaje_id;
    protected $personaje;
    protected $descripcion;
    protected $alt;
    protected $imagen;

    
    



    /**
     * Devuelve el listado completo de personajes en sistema
     */
    public function todos_los_personajes(): array
    {

        $resultado = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM personajes";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }


    /**
     * Devuelve los datos de un Personaje en particular
     * @param int $idPersonaje El ID único del personaje 
     */
    public function get_x_id(int $idPersonaje): ?Personajes
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM personajes WHERE personaje_id = :idPersonaje";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'idPersonaje' => $idPersonaje
            ]
        );

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }



    

    /**
     * Get the value of personaje
     */ 
    public function getPersonaje()
    {
        return $this->personaje;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }


    /**
     * Get the value of personaje_id
     */ 
    public function getPersonaje_id()
    {
        return $this->personaje_id;
    }

    /**
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImg()
    {
        return $this->imagen;
    }

    
    public function insert($personaje, $descripcion, $alt, $imagen){

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO personajes(`personaje_id`,`personaje`,`descripcion`,`alt`, `imagen`) VALUES (NULL, :personaje, :descripcion, :alt, :imagen)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'personaje' => $personaje,
            'descripcion' => $descripcion,
            'alt' => $alt,
            'imagen' => $imagen
        ]   
    );

    }



    public function edit($personaje, $descripcion, $alt, $personaje_id){

        $conexion = Conexion::getConexion();
        $query = "UPDATE personajes SET personaje = :personaje, descripcion = :descripcion, alt = :alt WHERE personaje_id = :personaje_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'personaje_id' => $personaje_id,
                'personaje' => $personaje,
                'descripcion' => $descripcion,
                'alt' => $alt
            ]   
        );
    }

        /**
     * Reemplaza la imagen de un personaje
     * @param string $imagen 
     * @param int $personaje_id
     */
    public function reemplazar_imagen($imagen, $personaje_id)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE personajes SET imagen = :imagen WHERE personaje_id = :personaje_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'personaje_id' => $personaje_id,
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
        $query = "DELETE FROM personajes WHERE personaje_id = ?;";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->personaje_id]);
    }


}
