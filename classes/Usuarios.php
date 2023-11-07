<?PHP 
class Usuarios
{
    protected $usuario_id;
    protected $email;
    protected $nombre_usuario;
    protected $nombre_completo;
    protected $password;
    protected $rol;

    /**
     * Encuentra un usuario por su Username
     * @param string $username El nombre de usuario
     */
    public function usuario_por_username(string $username): ?Usuarios
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$username]);

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }

    public function insert_usuario($email, $nombre_usuario, $nombre_completo, $password, $rol){

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO usuarios(`usuario_id`,`email`,`nombre_usuario`,`nombre_completo`,`password`,`rol`) VALUES (NULL, :email, :nombre_usuario, :nombre_completo, :password, :rol)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
    [
        'email' => $email,
        'nombre_usuario' => $nombre_usuario,
        'nombre_completo' => $nombre_completo,
        'password' => $password,
        'rol' => $rol,
    ]   
    );

    }   


    

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }
}