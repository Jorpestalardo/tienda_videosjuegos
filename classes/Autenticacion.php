<?PHP
class Autenticacion
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas guarda los datos en la sesión
     * @param string $username El nombre de usuario provisto
     * @param string $passwrod El password provisto
     * @return ?string Devuelve TRUE en caso que las credenciales sean correctas, FALSE en caso de que no lo sean
     */
    public function log_in(string $usuario, string $password) : ?string
    {
        //echo "<p>VAMOS A INTENTAR AUTENTICAR UN USUARIO</p>";
        //echo "<p>El nombre de usuario provisto es: $usuario</p>";
        //echo "<p>El password provisto es: $password</p>";

        $datosUsuario = (new Usuarios())->usuario_por_username($usuario);

        echo "<pre>";
        var_dump($datosUsuario);
        echo "</pre>";
        if($datosUsuario){
            if (password_verify($password, $datosUsuario->getPassword())) {
                //echo "<p>EL PASSWORD ES CORRECTO! LOGUEAR!</p>";
                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['id'] = $datosUsuario->getUsuario_id();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                return $datosLogin['rol'];
            } else {
                (new Alerta())->add_alerta('danger', "El password ingresado no es correcto.");
                return NULL;
            } 
        } else {
            (new Alerta())->add_alerta('warning', "El usuario ingresado no se encontro en nuestra base de datos.");
            return NULL;
        }
        
    }


    public function log_out()
    {
        (new Alerta())->clear_alertas();
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }

    public function verify(): bool
    {
        if (isset($_SESSION['loggedIn'])) {
            //echo "<pre>";
            //var_dump($_SESSION['loggedIn']);
            //echo "</pre>";
            return TRUE;
        } else {
            header('location: index.php?sec=login');
        }
    }
}


?>

