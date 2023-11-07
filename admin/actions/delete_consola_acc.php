<?PHP 

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$consola = (new Consola())->get_x_id($id);

echo "<pre>";
print_r($consola);
echo "</pre>";

try {
    if(!empty($consola->getImg())){
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/juegos/" . $consola->getImg());
    }
    $consola->delete();

    (new Alerta())->add_alerta('danger', "La consola <strong> {$consola->getNombre()} </strong> se eliminó correctamente :)");
    header('Location: ../index.php?sec=admin_consola');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo eliminar la consola :(");
}