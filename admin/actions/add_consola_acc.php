<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];


try {

    // echo "<pre>";
    // print_r($fileData);
    // echo "</pre>";

    //empty retorna true en caso que tengamos false, null, 0, "" ó []
    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/juegos", $fileData, $postData['nombre']);
    (new Consola())->insert(
        $postData['nombre'], 
        $postData['anio'],
        $postData['descripcion'],
        $postData['precio'],
        $postData['alt'],
        $imagen
    );

    (new Alerta())->add_alerta('success', "La consola <strong> {$postData['nombre']} </strong> se cargó correctamente :)");

    header('Location: ../index.php?sec=admin_consola');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar el personaje :(");
}
