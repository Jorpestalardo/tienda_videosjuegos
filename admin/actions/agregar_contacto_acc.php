<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;


try {

    

    (new Usuarios())->insert_usuario(
        $postData['email'], 
        $postData['nombre_usuario'],
        $postData['nombre_completo'],
        password_hash($postData['password'], PASSWORD_DEFAULT),
        $postData['rol']
        
    );

    (new Alerta())->add_alerta('success', "El usuario <strong> {$postData['nombre_usuario']} </strong> se registro correctamente");

    header('Location: ../../index.php?sec=login');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No puede registrarse :(");
}