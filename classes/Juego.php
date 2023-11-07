<?php
class Juego
{

    protected $producto_id;
    protected $creadores;
    protected $personaje;
    protected $consola;
    protected $nombre;
    protected $anio;
    protected $descripcion;
    protected $personajes_secundarios;
    protected $precio;
    protected $imagen;
    protected $alt;
    protected $player;

    protected static $createValues = ['producto_id','nombre','anio','descripcion','precio','imagen','alt','player'];
 //creo nueva propiedad

    /**
     * Devuelve una instancia del objeto Juego con todas sus propiedades configuradas.
     * @return Juego
     */
    public function createJuego($juegoData): Juego{

        $juego = new self();

        /* Configuramos nuestro objeto */
        //primero por cada valor en nuestro array de valores, buscamos el valor correspondiente y se lo asignamos a la propiedad
        foreach (self::$createValues as $value){
            $juego->{$value} = $juegoData[$value];

        }

        /*vamos a crear un objeto Creadores con los datos correspondientes y lo asignamos a la propiedad*/
        $juego->creadores = (new Creadores())->get_x_id($juegoData['creadores_id']);
        /*vamos a crear un objeto Consola con los datos correspondientes y lo asignamos a la propiedad*/
        $juego->consola = (new Consola())->get_x_id($juegoData['consola_id']);
        /*vamos a crear un objeto Personaje con los datos correspondientes y lo asignamos a la propiedad*/
        $juego->personaje = (new Personajes())->get_x_id($juegoData['personaje_id']);
        //Vamos a dividir el resultado de personajes secundarios por sus ",". 
        $PSIds = explode(",", $juegoData['personajes_secundarios']);
        $personajes_secundarios = [];
        if (!empty($PSIds[0])) {
            foreach ($PSIds as $PSId) {
                $personajes_secundarios[] = (new Personajes())->get_x_id(intval($PSId));
            }
        }
        $juego->personajes_secundarios = $personajes_secundarios;

        return $juego;
    }



/**
 * Devuelve el cátalogo completo de Juegos:
 */
    public function catalogo_completo(): array{

        $catalogo = [];
    
        $conexion = Conexion::getConexion();
        $query = "SELECT juego.*, GROUP_CONCAT(personajes_por_juego.personajes_id) AS personajes_secundarios FROM juego LEFT JOIN personajes_por_juego ON personajes_por_juego.producto_id = juego.producto_id GROUP BY juego.producto_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createJuego($result);
        }

        /*
        echo "<pre>";
        print_r($catalogo);
        echo "</pre>";
 */
        return $catalogo;
    }



    /**
 * Devuelve el cátalogo de productos de una consula en particular
 * @param int $idConsola Un int con el nombre de la consola a buscar
 * @return Juego[]
 */
public function catalogo_x_consola(int $idConsola): array{
    
    $catalogo = [];

    $conexion = Conexion::getConexion();
    $query = "SELECT juego.*, GROUP_CONCAT(personajes_por_juego.personajes_id) AS personajes_secundarios FROM juego LEFT JOIN personajes_por_juego ON personajes_por_juego.producto_id = juego.producto_id 
    WHERE consola_id = :idConsola GROUP BY juego.producto_id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute(
        [
            'idConsola' => $idConsola
        ]
    );

    while ($result = $PDOStatement->fetch()) {
        $catalogo[] = $this->createJuego($result);
    }

    return $catalogo;
}

/**
 * Devuelve el detalle de un juego en particular.
 * @param int $productoId El ID único del producto a mostrar
 */
public function consola_x_id(int $productoId): ?Juego{

    $conexion = Conexion::getConexion();
    $query = "SELECT juego.*, GROUP_CONCAT(personajes_por_juego.personajes_id) AS personajes_secundarios FROM juego LEFT JOIN personajes_por_juego ON personajes_por_juego.producto_id = juego.producto_id 
    WHERE juego.producto_id = :productoId GROUP BY juego.producto_id";    
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute(
        [
            'productoId' => $productoId
        ]
    );

    $result = $this->createJuego($PDOStatement->fetch());

    if (!$result) {
        return null;
    }
    return $result;
}

/**
 * Devuelve los juegos que se pueden jugar de a 1 o de a dos jugadores
 * @param int $player El número de jugadores dependiendo el juego.
 */
public function cuantos_pueden_jugar(int $player): array{

    $resultado = [];

    $conexion = Conexion::getConexion();
    $query = "SELECT juego.*, GROUP_CONCAT(personajes_por_juego.personajes_id) AS personajes_secundarios FROM juego LEFT JOIN personajes_por_juego ON personajes_por_juego.producto_id = juego.producto_id 
    WHERE player = :player GROUP BY juego.producto_id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute(
        [
            'player' => $player
        ]
    );

    while ($result = $PDOStatement->fetch()) {
        $resultado[] = $this->createJuego($result);
    }

    return $resultado;
}

/**
 * devuelve la descripción con la cantidad de palabras reducidas. 
 */
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
 * devuelve los creadores con la cantidad de palabras reducidas. 
 */
/*
public function creadores_reducido(int $cantidad = 3): string
{
        $texto = $this->getCreadores();

    $array = explode(" ", $texto);
    if (count($array) <= $cantidad) {
        $resultado = $texto;
    } else {
        array_splice($array, $cantidad);
        $resultado = implode(" ", $array) . "...";
    }

    return $resultado;
}
*/

/**
     * Crea un vinculo de personajes secundarios
     * @param int $producto_id
     * @param int $personajes_id
     */
    public function add_personajes_sec($producto_id, $personajes_id)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO personajes_por_juego VALUES (NULL, :producto_id, :personajes_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'producto_id' => $producto_id,
                'personajes_id' => $personajes_id
            ]
        );
    }


    /**
     * Vaciar lista de personajes secundarios
     * @param int $producto_id
     */
    public function clear_personajes_sec($producto_id)
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM personajes_por_juego WHERE producto_id = :producto_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'producto_id' => $producto_id
            ]
        );
    }


    /**
     * Get the value of player
     */ 
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Get the value of anio
     */ 
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Get the value of productoId
     */ 
    public function getproductoId()
    {
        return $this->producto_id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombreProducto()
    {
        return $this->nombre;
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
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }


    /**
     * Get the value of creadores_id
     */ 
    public function getCreadores(): Creadores
    {
        return $this->creadores;
        
    }

    /**
     * Get the value of consola_id
     */ 
    public function getConsola(): Consola
    {
        return $this->consola;
        
    }

    /**
     * Get the value of personaje_pricipal_id
     */
    public function getPersonajes(): Personajes
    {
        return $this->personaje;
    }

    /**
     * Get the value of creadores_id
     */ 
    public function getCreadores_id()
    {
        return $this->creadores->getCreadores_id();
    }

    /**
     * Get the value of personaje_id
     */ 
    public function getPersonaje_id()
    {
        return $this->personaje->getPersonaje_id();
    }


    
    /**
     * Get the value of consola_id
     */ 
    public function getConsola_id()
    {
        return $this->consola->getConsola_id();
    }

    /**
     * Get the value of personajes_secundarios
     * @return Personaje[]
     */
    public function getPersonajes_secundarios(): array
    {
        return $this->personajes_secundarios;
    }

    /**
     * Devuelve un array compuesto po IDs de todos los personajes secundarios
     */
    public function getPersonajes_secundarios_ids() :array
    {
        $result = [];
        foreach ($this->personajes_secundarios as $value) {
            $result[] = intval($value->getPersonaje_id());
        }
        return $result;
    }


    /**
     * @return int El id correspondiente a la fila ingresada
     */ 
    public function insert($creadores_id, $personaje_id, $consola_id, $nombre, $anio, $descripcion, $precio, $imagen, $alt, $player) : int
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO juego(`producto_id`, `creadores_id`, `personaje_id`, `consola_id`, `nombre`, `anio`, `descripcion`, `precio`, `imagen`, `alt`, `player`) 
        VALUES (NULL, :creadores_id, :personaje_id, :consola_id, :nombre, :anio, :descripcion, :precio, :imagen, :alt, :player)";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'creadores_id' => $creadores_id,
                'personaje_id' => $personaje_id,
                'consola_id' => $consola_id,
                'nombre' => $nombre,
                'anio' => $anio,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'imagen' => $imagen,
                'alt' => $alt,
                'player' => $player

            ]   
        );

        return $conexion->lastInsertId();
    
        }


        public function edit($creadores_id, $personaje_id, $consola_id, $nombre, $anio, $descripcion, $precio, $alt, $player, $producto_id){

            $conexion = Conexion::getConexion();
            $query = "UPDATE juego SET creadores_id = :creadores_id,
            personaje_id = :personaje_id,
            consola_id = :consola_id,
            nombre = :nombre,
            anio = :anio,
            descripcion = :descripcion, precio = :precio, alt = :alt, player = :player  WHERE producto_id = :producto_id";
    
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(
                [
                'producto_id' => $producto_id,
                'creadores_id' => $creadores_id,
                'personaje_id' => $personaje_id,
                'consola_id' => $consola_id,
                'nombre' => $nombre,
                'anio' => $anio,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'alt' => $alt,
                'player' => $player
                ]   
            );
        }
    
            /**
         * Reemplaza la imagen de un personaje
         * @param string $imagen 
         * @param int $producto_id
         */
        public function reemplazar_imagen($imagen, $producto_id)
        {
            $conexion = Conexion::getConexion();
            $query = "UPDATE juego SET imagen = :imagen WHERE producto_id = :producto_id";
    
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(
                [
                    'producto_id' => $producto_id,
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
            $query = "DELETE FROM juego WHERE producto_id = ?;";
    
    
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([$this->producto_id]);
        }

        



}