<?PHP 

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$juegos = (new Juego())->consola_x_id($id);

//echo "<pre>";
//print_r($juegos);
//echo "</pre>";

try {
    
    $juegos->clear_personajes_sec($id);

    if(!empty($juegos->getImg())){
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/juegos/" . $juegos->getImg());
    }
    $juegos->delete();

    (new Alerta())->add_alerta('danger', "El juego <strong> {$juegos->getNombreProducto()} </strong> se eliminó correctamente :)");
    header('Location: ../index.php?sec=admin_juego');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo eliminar el juego :(");
}