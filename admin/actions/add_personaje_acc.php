<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];


try {

    // echo "<pre>";
    // print_r($fileData);
    // echo "</pre>";

    //empty retorna true en caso que tengamos false, null, 0, "" ó []
    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/personajes", $fileData, $postData['nombre']);
    (new Personajes())->insert(
        $postData['nombre'], 
        $postData['descripcion'], 
        $postData['alt'],
        $imagen
    );
    (new Alerta())->add_alerta('success', "El personaje <strong> {$postData['nombre']} </strong> se cargó correctamente :)");
    header('Location: ../index.php?sec=admin_personajes');


} catch (\Exception $e) {
    //echo "<pre>";
    //print_r($e->getMessage());
    //echo "<pre>";
    //die("No se pudo cargar el personaje =(");
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado, por favor póngase en contacto con el administrador del  sistema");
    header('Location: ../index.php?sec=admin_personajes');
}
