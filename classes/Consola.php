<?PHP

class Consola
{
    protected $consola_id;
    protected $nombre;
    protected $anio;
    protected $descripcion;
    protected $precio;
    protected $imgp;
    protected $alt;
    protected $imagen;




    /**
 * Devuelve el cátalogo completo de Consolas:
 */
public function catalogo_completo(): array{
    
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM consola";
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
     * Devuelve los datos de una consola en particular
     * @param int $idConsola El ID único de la consola
     */
    public function get_x_id(int $idConsola): ?Consola
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM consola WHERE consola_id = :idConsola";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'idConsola' => $idConsola
            ]
        );

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }

    /**Devuelve la descripcion reducida en caracteres de consola */
    public function descripcion_reducida(int $cantidad = 9): string
{
    $texto = $this->descripcion;

    $array = explode(" ", $texto);
    if (count($array) <= $cantidad) {
        $resultado = $texto;
    } else {
        array_splice($array, $cantidad);
        $resultado = implode(" ", $array) . "...";
    }

    return $resultado;
}



    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of anio
     */ 
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->imagen;
    }

    /**
     * Get the value of imgp
     */ 
    public function getImgp()
    {
        return $this->imgp;
    }

    /**
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Get the value of consola_id
     */ 
    public function getConsola_id()
    {
        return $this->consola_id;
    }

    public function insert($nombre, $anio, $descripcion, $precio, $alt, $imagen){

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO consola(`consola_id`,`nombre`,`anio`,`descripcion`,`precio`,`alt`,`imagen`) VALUES (NULL, :nombre, :anio, :descripcion, :precio, :alt, :imagen)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'nombre' => $nombre,
            'anio' => $anio,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'imagen' => $imagen,
            'alt' => $alt
        ]   
    );

    }   


    public function edit($nombre, $anio, $descripcion, $precio, $alt, $consola_id){

    $conexion = Conexion::getConexion();
    $query = "UPDATE consola SET nombre = :nombre, anio = :anio, descripcion = :descripcion, precio = :precio, alt = :alt WHERE consola_id = :consola_id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'consola_id' => $consola_id,
            'nombre' => $nombre,
            'anio' => $anio,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'alt' => $alt
        ]   
    );
}

    /**
 * Reemplaza la imagen de una consola
 * @param string $imagen 
 * @param int $consola_id
 */
    public function reemplazar_imagen($imagen, $consola_id)
    {
    $conexion = Conexion::getConexion();
    $query = "UPDATE consola SET imagen = :imagen WHERE consola_id = :consola_id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'consola_id' => $consola_id,
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
    $query = "DELETE FROM consola WHERE consola_id = ?;";


    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->consola_id]);
    }

}
